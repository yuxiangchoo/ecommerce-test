<?php

namespace Webkul\MpDataTransfer\Helpers\Importers\SellerCategory;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Event;
use Webkul\Attribute\Repositories\AttributeRepository;
use Webkul\Category\Repositories\CategoryRepository;
use Webkul\DataTransfer\Contracts\ImportBatch as ImportBatchContract;
use Webkul\DataTransfer\Helpers\Import;
use Webkul\DataTransfer\Repositories\ImportBatchRepository;
use Webkul\Marketplace\Repositories\SellerCategoryRepository;
use Webkul\Marketplace\Repositories\SellerRepository;
use Webkul\MpDataTransfer\Helpers\Importers\Category\Importer as BaseImporter;
use Webkul\MpDataTransfer\Helpers\Importers\Category\Storage;
use Webkul\MpDataTransfer\Repositories\SellerImportsRepository;

class Importer extends BaseImporter
{
    /**
     * Is linking required
     */
    protected bool $linkingRequired = true;

    /**
     * Error code for column name invalid.
     */
    public const ERROR_CODE_SELLER_NOT_FOUND = 'seller_not_found';

    /**
     * Error code for missing seller profile.
     */
    public const ERROR_CODE_SELLER_PROFILE_FIELDS_MISSING = 'seller_profile_fields_missing';

    /**
     * Error message templates
     */
    protected array $messages = [
        self::ERROR_CODE_SELLER_NOT_FOUND              => 'mp_data_transfer::app.importers.seller.validation.errors.not-found',
        self::ERROR_CODE_SELLER_PROFILE_FIELDS_MISSING => 'mp_data_transfer::app.importers.seller.validation.errors.profile-fields-missing',
    ];
        
    /**
     * Create a new helper instance.
     *
     * @return void
     */
    public function __construct(
        protected AttributeRepository $attributeRepository,
        protected CategoryRepository $categoryRepository,
        protected ImportBatchRepository $importBatchRepository,
        protected SellerCategoryRepository $sellerCategoryRepository,
        protected SellerImportsRepository $sellerImportsRepository,
        protected SellerRepository $sellerRepository,
        protected Storage $categoryStorage,
    ) {
        parent::__construct( $attributeRepository, $categoryRepository, $importBatchRepository, $categoryStorage);
    }
    
    /**
     * Validate data.
     */
    public function validateData(): void
    {
        $importType = $this->import->type;

        $errors = [];

        if ('seller_categories' === $importType) {
            $sellerId = $this->sellerImportsRepository->findOneByField('import_id', $this->import->id)?->seller_id;

            $seller = $this->sellerRepository->find($sellerId);
            if (! $seller) {
                $errors[self::ERROR_CODE_SELLER_NOT_FOUND][] = '';
            }

            $requiredFields = ['shop_title', 'address1', 'phone', 'postcode', 'city', 'state', 'country'];

            $missingFields = [];

            foreach ($requiredFields as $field) {
                if (empty($seller[$field])) {
                   $missingFields[] = $field; 
                }
            }

            if (count($missingFields) > 1) {
                $errors[self::ERROR_CODE_SELLER_PROFILE_FIELDS_MISSING] = $missingFields;
            }
 
            foreach ($errors as $errorCode => $error) {
                $this->addErrors($errorCode, $error);
            }
        }

        parent::validateData();
    }

     /**
     * @inheritdoc
     */
    public function linkBatch(ImportBatchContract $batch): bool
    {
        Event::dispatch('data_transfer.imports.batch.linking.before', $batch);

        $importId = $batch->import->id;
        
        $sellerId = $this->sellerImportsRepository->findOneByField('import_id', $importId)?->seller_id;

        $seller = $this->sellerRepository->find($sellerId);
        
        if ($seller) {
            $this->categoryStorage->load(Arr::pluck($batch->data, 'slug'));

            $idsToLink = [];

            foreach ($batch->data as $rowData) {
                if (! $this->isCategoryExist($rowData['slug'])) {
                    continue;
                }

                $idsToLink[] = $this->categoryStorage->get($rowData['slug']);
            }

            if (! empty($idsToLink)) {
                $this->sellerCategoryRepository->updateOrCreate(
                    ['marketplace_seller_id' => $seller->id],
                    ['categories' => $idsToLink]
                );
            }
        }

        /**
         * Update import batch summary
         */
        $this->importBatchRepository->update([
            'state' => Import::STATE_LINKED,
        ], $batch->id);

        Event::dispatch('data_transfer.imports.batch.linking.after', $batch);
        
        return true;
    }

    /**
     * Check if category slug exists
     */
    public function isCategoryExist(string $slug): bool
    {
        return $this->categoryStorage->has($slug);
    }
}
