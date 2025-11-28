<?php

use Illuminate\Support\Facades\Route;
use Webkul\MpDataTransfer\Http\Controllers\Admin\ImportController;

/**
 * Settings routes.
 */
Route::group(['middleware' => ['admin'], 'prefix' => config('app.admin_url')], function () {
    Route::prefix('settings')->group(function () {
        /**
         * Data Transfer routes.
         */
        Route::prefix('data-transfer')->group(function () {
            /**
             * Import routes.
             */
            Route::controller(ImportController::class)->prefix('imports')->group(function () {
                Route::get('', 'index')->name('admin.settings.data_transfer.imports.index');

                Route::get('create', 'create')->name('admin.settings.data_transfer.imports.create');

                Route::post('create', 'store')->name('admin.settings.data_transfer.imports.store');

                Route::get('edit/{id}', 'edit')->name('admin.settings.data_transfer.imports.edit');

                Route::put('update/{id}', 'update')->name('admin.settings.data_transfer.imports.update');

                Route::delete('destroy/{id}', 'destroy')->name('admin.settings.data_transfer.imports.delete');

                Route::get('import/{id}', 'import')->name('admin.settings.data_transfer.imports.import');

                Route::get('validate/{id}', 'validateImport')->name('admin.settings.data_transfer.imports.validate');

                Route::get('start/{id}', 'start')->name('admin.settings.data_transfer.imports.start');

                Route::get('link/{id}', 'link')->name('admin.settings.data_transfer.imports.link');

                Route::get('index/{id}', 'indexData')->name('admin.settings.data_transfer.imports.index_data');

                Route::get('stats/{id}/{state?}', 'stats')->name('admin.settings.data_transfer.imports.stats');

                Route::get('download-sample/{type}/{format}', 'downloadSample')->name('admin.settings.data_transfer.imports.download_sample');

                Route::get('download/{id}', 'download')->name('admin.settings.data_transfer.imports.download');

                Route::get('download-error-report/{id}', 'downloadErrorReport')->name('admin.settings.data_transfer.imports.download_error_report');

                Route::get('download-sample-images-zip/{type?}', 'downloadSampleImagesZip')->name('admin.settings.data_transfer.imports.download_sample_zip');
            });
        });
    });
});
