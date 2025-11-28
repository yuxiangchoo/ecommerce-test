<?php

namespace Webkul\MpDataTransfer\Helpers\Importers\SellerProduct;

use Illuminate\Support\Arr;
use Webkul\Attribute\Repositories\AttributeFamilyRepository;
use Webkul\Attribute\Repositories\AttributeOptionRepository;
use Webkul\Attribute\Repositories\AttributeRepository;
use Webkul\Category\Repositories\CategoryRepository;
use Webkul\Core\Repositories\ChannelRepository;
use Illuminate\Support\Facades\Validator;
use Webkul\Core\Rules\Decimal;
use Webkul\DataTransfer\Helpers\Import;
use Webkul\Customer\Repositories\CustomerGroupRepository;
use Webkul\DataTransfer\Contracts\ImportBatch as ImportBatchContract;
use Webkul\DataTransfer\Helpers\Importers\Product\Importer as BaseProductImporter;
use Webkul\DataTransfer\Helpers\Importers\Product\SKUStorage;
use Webkul\DataTransfer\Repositories\ImportBatchRepository;
use Webkul\Inventory\Repositories\InventorySourceRepository;
use Webkul\Marketplace\Repositories\ProductRepository as MarketplaceProductRepository;
use Webkul\Marketplace\Repositories\SellerRepository;
use Webkul\MpDataTransfer\Repositories\SellerImportsRepository;
use Webkul\Product\Repositories\ProductAttributeValueRepository;
use Webkul\Product\Repositories\ProductBundleOptionProductRepository;
use Webkul\Product\Repositories\ProductBundleOptionRepository;
use Webkul\Product\Repositories\ProductCustomerGroupPriceRepository;
use Webkul\Product\Repositories\ProductFlatRepository;
use Webkul\Product\Repositories\ProductGroupedProductRepository;
use Webkul\Product\Repositories\ProductImageRepository;
use Webkul\Product\Repositories\ProductInventoryRepository;
use Webkul\Product\Repositories\ProductRepository;

class Importer extends BaseProductImporter
{
    /**
     * Error code for column name invalid.
     */
    public const ERROR_CODE_SELLER_NOT_FOUND = 'seller_not_found';

    public const ERROR_CODE_SELLER_PROFILE_FIELDS_MISSING = 'seller_profile_fields_missing';
    /**
     * Error message templates
     */
    protected array $messages = [
        self::ERROR_CODE_SELLER_NOT_FOUND              => 'mp_data_transfer::app.importers.seller.validation.errors.not-found',
        self::ERROR_CODE_SELLER_PROFILE_FIELDS_MISSING => 'mp_data_transfer::app.importers.seller.validation.errors.profile-fields-missing'
    ];

    /**
     * @Inheritdoc
     */
    public function __construct(
        protected ImportBatchRepository $importBatchRepository,
        protected AttributeFamilyRepository $attributeFamilyRepository,
        protected AttributeRepository $attributeRepository,
        protected AttributeOptionRepository $attributeOptionRepository,
        protected CategoryRepository $categoryRepository,
        protected CustomerGroupRepository $customerGroupRepository,
        protected ChannelRepository $channelRepository,
        protected InventorySourceRepository $inventorySourceRepository,
        protected ProductRepository $productRepository,
        protected ProductFlatRepository $productFlatRepository,
        protected ProductAttributeValueRepository $productAttributeValueRepository,
        protected ProductImageRepository $productImageRepository,
        protected ProductInventoryRepository $productInventoryRepository,
        protected ProductBundleOptionRepository $productBundleOptionRepository,
        protected ProductBundleOptionProductRepository $productBundleOptionProductRepository,
        protected ProductCustomerGroupPriceRepository $productCustomerGroupPriceRepository,
        protected ProductGroupedProductRepository $productGroupedProductRepository,
        protected SKUStorage $skuStorage,
        protected SellerImportsRepository $sellerImportsRepository,
        protected SellerRepository $sellerRepository,
        protected MarketplaceProductRepository $marketplaceProductRepository
    ) {
        parent::__construct(
            $importBatchRepository,
            $attributeFamilyRepository,
            $attributeRepository,
            $attributeOptionRepository,
            $categoryRepository,
            $customerGroupRepository,
            $channelRepository,
            $inventorySourceRepository,
            $productRepository,
            $productFlatRepository,
            $productAttributeValueRepository,
            $productImageRepository,
            $productInventoryRepository,
            $productBundleOptionRepository,
            $productBundleOptionProductRepository,
            $productCustomerGroupPriceRepository,
            $productGroupedProductRepository,
            $skuStorage
        );
    }

    /**
     * Validate data.
     */
    public function validateData(): void
    {
        $importType = $this->import->type;
        $errors = [];
        if ('seller_products' === $importType) {
            $sellerId = $this->sellerImportsRepository->findOneByField('import_id', $this->import->id)?->seller_id;

            $seller = $this->sellerRepository->find($sellerId);

            if (!$seller) {
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
     * @Inheritdoc
     */
    public function linkBatch(ImportBatchContract $batch): bool
    {
        parent::linkBatch($batch);

        $importId = $batch->import->id;

        $sellerId = $this->sellerImportsRepository->findOneByField('import_id', $importId)?->seller_id;

        $seller = $this->sellerRepository->find($sellerId);

        $allowedProductTypes = $seller?->allowed_product_types ?? ["simple", "configurable", "virtual", "downloadable", "bundle", "grouped"];

        if ($seller) {
            foreach ($batch->data as $rowData) {
                $product = $this->skuStorage->get($rowData['sku']);

                $marketplaceProduct = $this->marketplaceProductRepository->findOneWhere([
                    'product_id'            => $product['id'],
                    'marketplace_seller_id' => $sellerId,
                ]);

                if (
                    in_array($product['type'], $allowedProductTypes)
                    && ! $marketplaceProduct
                ) {
                    $productExistInMarketplace = $this->marketplaceProductRepository->findOneWhere([
                        'product_id' => $product['id']
                    ]);

                    if (! $productExistInMarketplace) {
                        $data = [
                            'product_id' => (int) $product['id'],
                            'is_owner'   => 1,
                        ];
                        $this->marketplaceProductRepository->create($data, $seller);
                    } else {
                        $data = [
                            'product_id' => (int) $product['id'],
                            'is_owner'   => 0,
                            'seller_id'  => $sellerId,
                        ];
                        $this->marketplaceProductRepository->createAssign($data);
                    }
                }
            }
        }

        return true;
    }

    /**
     * Save Inventories.
     */
    public function saveInventories(array $inventories): void
    {
        $importType = $this->import->type;

        if ('seller_products' === $importType) {
            $sellerId = $this->sellerImportsRepository->findOneByField('import_id', $this->import->id)?->seller_id;

            if (empty($inventories)) {
                return;
            }

            $inventorySources = $this->inventorySourceRepository
                ->findWhereIn('code', Arr::flatten(Arr::pluck($inventories, '*.source')));

            $productInventories = [];

            foreach ($inventories as $sku => $skuInventories) {
                $product = $this->skuStorage->get($sku);

                foreach ($skuInventories as $inventory) {
                    $inventorySource = $inventorySources->where('code', $inventory['source'])->first();

                    if (! $inventorySource) {
                        continue;
                    }

                    $productInventories[] = [
                        'inventory_source_id' => $inventorySource->id,
                        'product_id'          => $product['id'],
                        'qty'                 => $inventory['qty'],
                        'vendor_id'           => $sellerId,
                    ];
                }
            }

            $this->productInventoryRepository->upsert(
                $productInventories,
                [
                    'product_id',
                    'inventory_source_id',
                    'vendor_id',
                ],
            );
        }

        parent::saveInventories($inventories);
    }

    /**
     * Save validated batches
     */
    protected function saveValidatedBatches(): self
    {
        $source = $this->getSource();

        $source->rewind();

        $this->skuStorage->init();

        while ($source->valid()) {
            try {
                $rowData = $source->current();
            } catch (\InvalidArgumentException $e) {
                $source->next();

                continue;
            }

            $this->validateRow($rowData, $source->getCurrentRowNumber());

            $source->next();
        }

        $this->checkForDuplicateUrlKeys();

        parent::saveValidatedBatches();

        return $this;
    }

    /**
     * Validates row
     */
    public function validateRow(array $rowData, int $rowNumber): bool
    {
        /**
         * If row is already validated than no need for further validation
         */
        if (isset($this->validatedRows[$rowNumber])) {
            return ! $this->errorHelper->isRowInvalid($rowNumber);
        }

        $this->validatedRows[$rowNumber] = true;

        /**
         * If import action is delete than no need for further validation
         */
        if ($this->import->action == Import::ACTION_DELETE) {
            if (! $this->isSKUExist($rowData['sku'])) {
                $this->skipRow($rowNumber, self::ERROR_SKU_NOT_FOUND_FOR_DELETE);

                return false;
            }

            return true;
        }

        /**
         * Check if product type exists
         */
        if (
            $rowData['type'] == self::PRODUCT_TYPE_DOWNLOADABLE
            || ! config('product_types.' . $rowData['type'])
        ) {
            $this->skipRow($rowNumber, self::ERROR_INVALID_TYPE, 'type');

            return false;
        }

        /**
         * Check if attribute family exists
         */
        if (! $this->attributeFamilies->where('code', $rowData['attribute_family_code'])->first()) {
            $this->skipRow($rowNumber, self::ERROR_INVALID_ATTRIBUTE_FAMILY_CODE, 'attribute_family_code');

            return false;
        }

        if (! isset($this->typeFamilyValidationRules[$rowData['type']][$rowData['attribute_family_code']])) {
            $this->typeFamilyValidationRules[$rowData['type']][$rowData['attribute_family_code']] = $this->getValidationRules($rowData);
        }

        /**
         * Validate product attributes
         */
        $validator = Validator::make($rowData, $this->typeFamilyValidationRules[$rowData['type']][$rowData['attribute_family_code']]);

        if ($validator->fails()) {
            $failedAttributes = $validator->failed();

            foreach ($validator->errors()->getMessages() as $attributeCode => $message) {
                $errorCode = array_key_first($failedAttributes[$attributeCode] ?? []);

                $this->skipRow($rowNumber, $errorCode, $attributeCode, current($message));
            }
        }

        /**
         * Check if url_key is unique
         */
        if (
            empty($rowData['url_key'])
            || (isset($this->urlKeys[$rowData['url_key']]) && $this->urlKeys[$rowData['url_key']] == $rowData['url_key'])
        ) {
            $this->skipRow($rowNumber, self::ERROR_DUPLICATE_URL_KEY, 'url_key');

            return false;
        }

        $this->urlKeys[$rowData['url_key']] = $rowData['url_key'];

        /**
         * Additional Validations
         *
         * 1: Check if bundle option data is valid
         * 2: Check if grouped products data is valid
         * 3: Check if grouped products data is valid
         * 4: Customer group prices validation for non composite products
         */
        $optionsData = [];

        $validationRules = [];

        if ($rowData['type'] == self::PRODUCT_TYPE_BUNDLE) {
            $validationRules = [
                'bundle_options.*.name'     => 'sometimes|required',
                'bundle_options.*.type'     => 'sometimes|required|in:select,radio,checkbox,multiselect',
                'bundle_options.*.required' => 'sometimes|required|boolean',
                'bundle_options.*.sku'      => 'sometimes|required',
                'bundle_options.*.price'    => ['sometimes', 'required', new Decimal],
                'bundle_options.*.qty'      => 'sometimes|required|integer',
                'bundle_options.*.default'  => 'sometimes|required|boolean',
            ];

            $options = explode('|', $rowData['bundle_options'] ?? '');

            foreach ($options as $option) {
                parse_str(str_replace(',', '&', $option), $attributes);

                $optionsData['bundle_options'][] = $attributes;
            }
        } elseif ($rowData['type'] == self::PRODUCT_TYPE_GROUPED) {
            $validationRules = [
                'associated_skus.*.sku' => 'sometimes|required',
                'associated_skus.*.qty' => 'sometimes|required|integer',
            ];

            $associatedSkus = explode(',', $rowData['associated_skus'] ?? '');

            foreach ($associatedSkus as $row) {
                [$sku, $qty] = explode('=', $row);

                $optionsData['associated_skus'][] = [
                    'sku' => $sku ?? '',
                    'qty' => $qty ?? null,
                ];
            }
        } elseif ($rowData['type'] == self::PRODUCT_TYPE_CONFIGURABLE) {
            $validationRules = [
                'configurable_variants.*.sku' => 'sometimes|required',
            ];

            $options = explode('|', $rowData['configurable_variants'] ?? '');

            foreach ($options as $option) {
                parse_str(str_replace(',', '&', $option), $attributes);

                $optionsData['configurable_variants'][] = $attributes;
            }
        } else {
            /**
             * Validate customer group prices
             */
            $validationRules = [
                'customer_group_prices.*.group' => 'sometimes|required',
                'customer_group_prices.*.qty'   => 'sometimes|required|integer',
                'customer_group_prices.*.type'  => 'sometimes|required|in:fixed,discount',
                'customer_group_prices.*.price' => ['sometimes', 'required', new Decimal],
            ];

            $customerGroupPrices = explode('|', $rowData['customer_group_prices'] ?? '');

            foreach ($customerGroupPrices as $customerGroupPrice) {
                parse_str(str_replace(',', '&', $customerGroupPrice), $attributes);

                $optionsData['customer_group_prices'][] = $attributes;
            }
        }

        if (! empty($optionsData)) {
            $validator = Validator::make($optionsData, $validationRules);

            if ($validator->fails()) {
                foreach ($validator->errors()->getMessages() as $attributeCode => $message) {
                    $failedAttributes = $validator->failed();

                    $errorCode = array_key_first($failedAttributes[$attributeCode] ?? []);

                    $this->skipRow($rowNumber, $errorCode, $attributeCode, current($message));
                }
            }
        }

        /**
         * Check if configurable super attribute exists in the attribute family
         *
         * Below is the example of configurable_variants
         *
         * sku=SP-005,color=Yellow,size=M|sku=SP-006,color=Yellow,size=L|sku=SP-007,color=Green,size=M|sku=SP-008,color=Green,size=L
         */
        if ($rowData['type'] == self::PRODUCT_TYPE_CONFIGURABLE) {
            $variants = explode('|', $rowData['configurable_variants'] ?? '');

            $familyAttributes = $this->getProductTypeFamilyAttributes($rowData['type'], $rowData['attribute_family_code']);

            foreach ($variants as $variant) {
                parse_str(str_replace(',', '&', $variant), $variantAttributes);

                $configurableVariants = Arr::except($variantAttributes, 'sku');

                foreach ($configurableVariants as $superAttribute => $optionLabel) {
                    if (! $familyAttributes->where('code', $superAttribute)->first()) {
                        $this->skipRow(
                            $rowNumber,
                            self::ERROR_SUPER_ATTRIBUTE_CODE_NOT_FOUND,
                            'configurable_variants',
                            sprintf(
                                trans($this->messages[self::ERROR_SUPER_ATTRIBUTE_CODE_NOT_FOUND]),
                                $superAttribute,
                                $rowData['attribute_family_code']
                            )
                        );
                    }
                }
            }
        }

        return ! $this->errorHelper->isRowInvalid($rowNumber);
    }
}
