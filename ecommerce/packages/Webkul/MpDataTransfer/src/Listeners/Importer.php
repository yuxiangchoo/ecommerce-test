<?php

namespace Webkul\MpDataTransfer\Listeners;

use Webkul\MpDataTransfer\Repositories\SellerImportsRepository;

class Importer
{
    /**
     * create new mapping for the import and seller
     */
    public function __construct(
        protected SellerImportsRepository $sellerImportRepository,
    ) {}

    /**
     * Import profile mapping with seller after create event
     */
    public function afterCreateImport($import): void
    {
        $importType = $import->type;

        if (
            'seller_products' === $importType 
            || 'seller_categories' === $importType
        ) {
            $sellerId = request()->only(['seller']);

            $importProfileId = $import->id;

            $mapping = $this->sellerImportRepository->create([
                'seller_id' => (int)$sellerId['seller'],
                'import_id' => $importProfileId,
            ]);
        }
    }

    /**
     * Import profile mapping with seller after update event
     */
    public function afterUpdateImport($import): void
    {
        $importType = $import->type;

        if (
            'seller_products' === $importType 
            || 'seller_categories' === $importType
        ) {
            $sellerId = request()->only(['seller']);

            $importId = $import->id;  
                      
            $sellerImport = $this->sellerImportRepository->findOneByField('import_id', $importId);

            if ($sellerImport) {
                $sellerImport->fill([
                    'seller_id' => (int) $sellerId['seller'],
                    'import_id' => $importId
                ]);
                
                $sellerImport->save();
            } else {
                $mapping = $this->sellerImportRepository->create([
                    'seller_id' => (int)$sellerId['seller'],
                    'import_id' => $importId
                ]);                
            }
        }
    }
}
