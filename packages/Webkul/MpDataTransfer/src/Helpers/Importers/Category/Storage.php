<?php

namespace Webkul\MpDataTransfer\Helpers\Importers\Category;

use Webkul\Category\Repositories\CategoryRepository;

class Storage
{
    /**
     * Items contains name as key and product information as value
     */
    protected array $items = [];

    /**
     * Columns which will be selected from database
     */
    protected array $selectColumns = [
        'id',
    ];

    /**
     * Columns which will be selected from the translation table
     */
    protected array $selectTranslationColumns = [
        'slug'
    ];

    /**
     * Create a new helper instance.
     *
     * @return void
     */
    public function __construct(protected CategoryRepository $categoryRepository)
    {
    }

    /**
     * Initialize storage
     */
    public function init(): void
    {
        $this->items = [];

        $this->load();
    }

    /**
     * Load the Names
     */
    public function load(array $slugs = []): void
    {
        if (empty($slugs)) {
            $categories =  $this->categoryRepository->query()
                ->leftJoin('category_translations', 'category_translations.category_id', '=', 'categories.id')
                ->select('categories.id', 'slug')
                ->get();
        } else {
            $categories =  $this->categoryRepository->query()
                ->leftJoin('category_translations', 'category_translations.category_id', '=', 'categories.id')
                ->select('categories.id', 'slug')
                ->whereIn('category_translations.slug', $slugs)
                ->get();            
        }

        foreach ($categories as $category) {
            $this->set($category->slug, $category->id);
        }
    
    }

    /**
     * Get slug information
     */
    public function set(string $slug, int $id): self
    {
        $this->items[$slug] = $id;

        return $this;
    }

    /**
     * Check if slug exists
     */
    public function has(string $slug): bool
    {
        return isset($this->items[$slug]);
    }

    /**
     * Get slug information
     */
    public function get(string $slug): ?int
    {
        if (! $this->has($slug)) {
            return null;
        }

        return $this->items[$slug];
    }

    /**
     * Is storage is empty
     */
    public function isEmpty(): int
    {
        return empty($this->items);
    }
}