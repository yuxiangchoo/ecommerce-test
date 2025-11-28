<?php

namespace Webkul\MpDataTransfer\Helpers\Importers\Category;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage as DiskStorage;
use Illuminate\Support\Facades\Validator;  
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Webkul\Attribute\Repositories\AttributeRepository;
use Webkul\Category\Repositories\CategoryRepository;
use Webkul\DataTransfer\Contracts\ImportBatch as ImportBatchContract;
use Webkul\DataTransfer\Helpers\Import;
use Webkul\DataTransfer\Helpers\Importers\AbstractImporter;
use Webkul\DataTransfer\Repositories\ImportBatchRepository;

class Importer extends AbstractImporter
{
    /**
     *  Error code for duplicated slug
     */
    const ERROR_DUPLICATE_SLUG = 'duplicate_slug';

    /**
     * Error code for non existing slug
     */
    const ERROR_SLUG_NOT_FOUND_FOR_DELETE = 'slug_not_found_to_delete';

    /**
     * invalid display mode
     */
    const INVALID_DISPLAY_MODE = 'invalid_display_mode';

    /**
     * Permanent entity columns
     */
    protected array $validColumnNames = [
        'name',
        'parent',
        'locale',
        'description',
        'logo',
        'banner',
        'meta_title',
        'slug',
        'slug_translation',
        'meta_keywords',
        'meta_description',
        'position',
        'display_mode',
        'visible_in_menu',
        'filterable_attributes',
    ];

    /**
     * Category supported image types
     */
    protected array $imageTypes = [
       'logo'   => 'logo_path',
       'banner' => 'banner_path',
    ];

    /**
     * Permanent entity columns
     *
     * @var string[]
     */
    protected $permanentAttributes = [];

    /**
     * Permanent entity column
     */
    protected string $masterAttributeCode = 'id';

    /**
     * Error message templates
     */
    protected array $messages = [
        self::ERROR_DUPLICATE_SLUG            => 'mp_data_transfer::app.importers.categories.validation.errors.duplicate-slug',  
        self::ERROR_SLUG_NOT_FOUND_FOR_DELETE => 'mp_data_transfer::app.importers.categories.validation.errors.slug_not_found_to_delete',
        self::INVALID_DISPLAY_MODE            => 'mp_data_transfer::app.importers.categories.validation.errors.invalid_display_mode',
    ];

    /**
     * slugs storage
     */
    protected array $slugs = [];

    /**
     * Create a new helper instance.
     *
     * @return void
     */
    public function __construct(
        protected AttributeRepository $attributeRepository,
        protected CategoryRepository $categoryRepository,
        protected ImportBatchRepository $importBatchRepository,
        protected Storage $categoryStorage,
    ) {
        parent::__construct($importBatchRepository);
    }

    /**
     * Initialize Product error templates
     */
    protected function initErrorMessages(): void
    {
        foreach ($this->messages as $errorCode => $message) {
            $this->errorHelper->addErrorMessage($errorCode, trans($message));
        }

        parent::initErrorMessages();
    }

    /**
     * Validate data.
     */
    public function validateData(): void
    {
        $this->categoryStorage->init();

        parent::validateData();
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
            if (! $this->isCategoryExist($rowData['slug'])) {
                $this->skipRow($rowNumber, self::ERROR_SLUG_NOT_FOUND_FOR_DELETE, $rowData['slug']);

                return false;
            }

            return true;
        }

        /**
         * Validate category attributes
         */
        $validator = Validator::make($rowData, [
            'name'                  => 'string|required',
            'parent'                => 'string',
            'description'           => 'string|required',
            'meta_title'            => 'string|required',
            'slug'                  => 'string|required',
            'slug_translation'      => 'string',
            'meta_keywords'         => 'string|required',
            'meta_description'      => 'string|required',
            'position'              => 'string|required',
            'display_mode'          => 'required:in,products_and_description,products_only,description_only',
            'visible_in_menu'       => 'required:in,1,0',
            'filterable_attributes' => 'string|required',
        ]);

        if ($validator->fails()) {
            $failedAttributes = $validator->failed();

            foreach ($validator->errors()->getMessages() as $attributeCode => $message) {
                $errorCode = array_key_first($failedAttributes[$attributeCode] ?? []);

                $this->skipRow($rowNumber, $errorCode, $attributeCode, current($message));
            }
        }

        if (
            empty($rowData['display_mode']) 
            || ! in_array($rowData['display_mode'], ['products_and_description','products_only','description_only'])
        ) {
            $message = sprintf(
                trans($this->messages[self::INVALID_DISPLAY_MODE]),
                $rowData['display_mode']
            );

            $this->skipRow($rowNumber, self::INVALID_DISPLAY_MODE, 'display_mode', $message);
        }

        /**
         * Check if slug is unique
         */
        if (! empty($rowData['slug_translation'])) {
            if (! in_array($rowData['slug_translation'], $this->slugs)) {
                $this->slugs[] = $rowData['slug_translation'];
            } else {
                $message = sprintf(
                    trans($this->messages[self::ERROR_DUPLICATE_SLUG]),
                    $rowData['slug_translation']
                );
    
                $this->skipRow($rowNumber, self::ERROR_DUPLICATE_SLUG, 'slug_translation', $message);
            }
        }

        return ! $this->errorHelper->isRowInvalid($rowNumber);
    }

    /**
     * Start the import process
     */
    public function importBatch(ImportBatchContract $batch): bool
    {
        Event::dispatch('data_transfer.imports.batch.import.before', $batch);

        if ($batch->import->action == Import::ACTION_DELETE) {
            $this->deleteCategoryData($batch);
        } else {
            $this->saveCategoryData($batch);
        }

        /**
         * Update import batch summary
         */
        $batch = $this->importBatchRepository->update([
            'state'   => Import::STATE_PROCESSED,
            'summary' => [
                'created' => $this->getCreatedItemsCount(),
                'updated' => $this->getUpdatedItemsCount(),
                'deleted' => $this->getDeletedItemsCount(),
            ],
        ], $batch->id);

        Event::dispatch('data_transfer.imports.batch.import.after', $batch);

        return true;
    }

    /**
     * Delete categories from current batch
     */
    protected function deleteCategoryData(ImportBatchContract $batch): bool
    {
        /**
         * Load categories storage with batch slugs
         */
        $this->categoryStorage->load(Arr::pluck($batch->data, 'slug'));

        $idsToDelete = [];

        foreach ($batch->data as $rowData) {
            if (! $this->isCategoryExist($rowData['slug'])) {
                continue;
            }

            $idsToDelete[] = $this->categoryStorage->get($rowData['slug']);
        }

        $idsToDelete = array_unique($idsToDelete);

        $this->deletedItemsCount = count($idsToDelete);

        $this->categoryRepository->deleteWhere([['id', 'IN', $idsToDelete]]);

        return true;
    }

    /**
     * Save category from current batch
     */
    protected function saveCategoryData(ImportBatchContract $batch): bool
    {
        /**
         * Load category storage with batch slug
         */
        $this->categoryStorage->load(Arr::pluck($batch->data, 'slug'));

        $categories = [];

        $imagesData = [];

        foreach ($batch->data as $rowData) {
            /**
             * Prepare categories for import
             */
            $this->prepareCategories($rowData, $categories);

            $this->prepareImage($rowData, $imagesData);          
        }

        $this->saveCategories($categories);

        $this->saveImages($imagesData);

        return true;
    }

    /**
     * Prepare categories from current batch
     */
    public function prepareCategories(array $rowData, array &$categories): void
    {
        $data = [
            'locale'           => $rowData['locale'],
            'parent'           => $rowData['parent'],
            'position'         => $rowData['position'],
            'display_mode'     => $rowData['display_mode'],
            'status'           => $rowData['visible_in_menu'],
            'attributes'       => $this->getFilterableAttributesId(explode(',', $rowData['filterable_attributes'])),
        ];
        
        $translation =  [ 
            'locale'           => $rowData['locale'],
            'locale_id'        => $this->getLocalId($rowData['locale']),
            'name'             => $rowData['name'],
            'description'      => $rowData['description'],
            'slug'             => ! empty($rowData['slug_translation']) ? $rowData['slug_translation'] : $rowData['slug'],
            'meta_title'       => $rowData['meta_title'],
            'meta_keywords'    => $rowData['meta_keywords'],
            'meta_description' => $rowData['meta_description'],
        ];

        if ($this->isCategoryExist($rowData['slug'])) {
            $categories['update'][$rowData['slug']] = array_merge($categories['update'][$rowData['slug']] ?? [], $data);
            $categories['update'][$rowData['slug']][$rowData['locale']] = $translation;
        } else {
            $categories['insert'][$rowData['slug']] = array_merge($categories['insert'][$rowData['slug']] ?? [], $data);
            $categories['insert'][$rowData['slug']][$rowData['locale']] = $translation;
        }
    }
 
    /**
     * Get the filterable attributes id.
     */
    protected function getFilterableAttributesId(array $filterableAttributes): array
    {
        $filterableAttributesId = [];

        foreach ($filterableAttributes as $attributeCode) {
            $filterableAttributesId[] = $this->attributeRepository->findWhere(['is_filterable' => 1, 'code' => $attributeCode])->first()?->id;
        }

        return $filterableAttributesId;
    }

    /**
     * Get the local id using code
     */
    protected function getLocalId($localeCode)
    {
        return DB::table('locales')->where('code', $localeCode)->first()?->id;
    }

    /**
     * Prepare images from current batch
     */
    public function prepareImage(array $rowData, array &$imagesData): void
    {
        foreach ($this->imageTypes as $type => $typeName) {
          
            if (empty($rowData[$type])) {
                continue;
            }
     
            $path = 'import/'.$this->import->images_directory_path.'/'.$rowData[$type];
    
            if (! DiskStorage::disk('local')->has($path)) {
                continue;
            }
    
            $imagesData[$rowData['slug']][$type] = [
                'name' => $rowData[$type],
                'path' => DiskStorage::disk('local')->path($path),
            ];
        }
    }

    /**
     * Save images from current batch
     */
    public function saveImages(array $imagesData): void
    {
        if (empty($imagesData)) {
            return;
        }

        foreach ($imagesData as $slug => $imageData) {
            $categoryId = $this->categoryStorage->get($slug);

            $category = $this->categoryRepository->find($categoryId);

            if (! $category) {
                continue;
            }
            
            $isDirty = false; 

            foreach($this->imageTypes as $type => $typeName) {
                if (! isset($imageData[$type])) {
                    continue;
                }
    
                $file = new UploadedFile($imageData[$type]['path'], $imageData[$type]['name']);
    
                $image = (new ImageManager())->make($file)->encode('webp');
    
                $category->{$typeName} = 'category/'.$category->id.'/'.Str::random(40).'.webp';
                
                DiskStorage::put($category->{$typeName}, $image);

                $isDirty = true;
            }

            if ($isDirty) {
                $category->save();
            }
        }
    }
 
    /**
     * Get category Id by slug
     */
    public function getCategoryId(?string $slug)
    {
        if (! $slug) {
            throw new \Exception('category slug not found');
        }

        return $this->categoryRepository
            ->whereTranslation('slug', $slug)
            ->first()?->id;
    }

    /**
     * Save categories from current batch
     */
    public function saveCategories(array $categories): void
    {        
        /** single insert/update in the db because of parent  */
        if (! empty($categories['update'])) {
            $this->updatedItemsCount += count($categories['update']);
            
            foreach($categories['update'] as $slug => $category) {
                $this->updateParentCategoryId($category);
                $this->categoryRepository->update($category, $this->categoryStorage->get($slug));
            }            
        }

        if (! empty($categories['insert'])) {
            $this->createdItemsCount += count($categories['insert']);
            foreach($categories['insert'] as $slug => $category) {  
                $this->updateParentCategoryId($category); 
                $newCategory = $this->categoryRepository->create($category);
                if ($newCategory) {
                    $this->categoryStorage->set($slug,  $newCategory?->id);
                }
            }
        }
    }

    /**
     * Updated Parent category.
     */
    public function updateParentCategoryId(&$category) 
    {
        if (! empty($category['parent'])) {
            $category['parent_id'] = $this->getCategoryId($category['parent']);
        }

        unset($category['parent']);
    }

    /**
     * Check if category slug exists
     */
    public function isCategoryExist(string $slug): bool
    {
        return $this->categoryStorage->has($slug);
    }
}