<?php

namespace Webkul\MpDataTransfer\Providers;

use Illuminate\Contracts\Foundation\CachesConfiguration;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class MpDataTransferServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (core()->getConfigData('marketplace.settings.general.status')) {
            Route::middleware('web')->group(__DIR__ . '/../Routes/web.php');

            $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'mp_data_transfer');

            $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

            $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'mp_data_transfer');

            $this->app->register(EventServiceProvider::class);

            $this->app->register(ModuleServiceProvider::class);

            $this->mergeConfigTo(
                dirname(__DIR__) . '/Config/importers.php',
                'importers'
            );

            $this->mergeConfigTo(
                dirname(__DIR__) . '/Config/importers.php',
                'seller_importers'
            );

            $this->mergeConfigFrom(
                dirname(__DIR__) . '/Config/seller-menu.php',
                'marketplace_menu.seller'
            );
        }

        File::makeDirectory(storage_path('app/public/mp-data-transfer/samples'), 0775, true, true);

        $this->publishes([
            __DIR__ . '/../../publishable' => public_path('themes/mp_data_transfer/')
        ], 'public');

        /**
         * Sample files publish in public directory
         */
        $this->publishes([
            __DIR__ . '/../Resources/assets/samples/seller_products.csv'
            => storage_path('app/public/mp-data-transfer/samples/seller_products.csv'),
        ]);

        $this->publishes([
            __DIR__ . '/../Resources/assets/samples/categories.csv'
            => storage_path('app/public/mp-data-transfer/samples/categories.csv'),
        ]);

        $this->publishes([
            __DIR__ . '/../Resources/assets/samples/seller_products.xls'
            => storage_path('app/public/mp-data-transfer/samples/seller_products.xls'),
        ]);

        $this->publishes([
            __DIR__ . '/../Resources/assets/samples/seller_products.xlsx'
            => storage_path('app/public/mp-data-transfer/samples/seller_products.xlsx'),
        ]);

        /**
         * Sample images zip publish in public directory
         */
        $this->publishes([
            __DIR__ . '/../Resources/assets/samples/category_images.zip'
            => storage_path('app/public/mp-data-transfer/samples/category_images.zip'),
        ]);

        $this->publishes([
            __DIR__ . '/../Resources/assets/samples/product_images.zip'
            => storage_path('app/public/mp-data-transfer/samples/product_images.zip'),
        ]);

        /**
         * For replace the datagrid file
         */
        $this->publishes([
            __DIR__ . '/../Datagrids/Admin/Settings/DataTransfer/ImportDataGrid.php'
            => __DIR__ . '/../../../Admin/src/DataGrids/Settings/DataTransfer/ImportDataGrid.php',
        ]);

        $this->publishes([
            __DIR__ . '/../Resources/views/shop/components/datagrid/table.blade.php'
            => resource_path('themes/default/views/components/datagrid/table.blade.php'),
        ]);

        $this->publishes([
            __DIR__ . '/../Resources/views/admin/settings/data-transfer/imports/import-create.blade.php'
                => resource_path('views/vendor/admin/settings/data-transfer/imports/create.blade.php'),
        ]);

        $this->publishes([
            __DIR__ . '/../Resources/views/admin/settings/data-transfer/imports/import-edit.blade.php'
                => resource_path('views/vendor/admin/settings/data-transfer/imports/edit.blade.php'),
        ]);

        require __DIR__ . '/../Routes/breadcrumbs.php';
    }

    /**
     * Merge the given configuration with the existing configuration.
     *
     * @param string $path
     * @param string $key
     * @return void
     */
    protected function mergeConfigTo($path, $key)
    {
        if (! ($this->app instanceof CachesConfiguration && $this->app->configurationIsCached())) {
            $config = $this->app->make('config');

            $config->set($key, array_merge(
                $config->get($key, []),
                require $path
            ));
        }
    }
}
