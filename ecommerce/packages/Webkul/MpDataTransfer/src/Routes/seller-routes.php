<?php

use Illuminate\Support\Facades\Route;
use Webkul\MpDataTransfer\Http\Controllers\Shop\SellerImportController;

Route::group([
    'middleware' => ['theme', 'locale', 'currency', 'marketplace', 'seller'],
    'prefix'     => 'marketplace',
], function () {
    Route::controller(SellerImportController::class)->prefix('seller/account/seller-data-transfer')->group(function () {
        Route::get('', 'index')->name('shop.mp_data_transfer.seller.account.seller_data_transfer.index');
        
        Route::get('download/{id}', 'download')->name('shop.mp_data_transfer.seller.account.seller_data_transfer.imports.download');
        
        Route::get('download-error-report/{id}', 'downloadErrorReport')->name('shop.mp_data_transfer.seller.account.seller_data_transfer.imports.download_error_report');
        
        Route::get('import/{id}', 'import')->name('shop.mp_data_transfer.seller.account.seller_data_transfer.imports.import');        
        
        Route::get('edit/{id}', 'edit')->name('shop.mp_data_transfer.seller.account.seller_data_transfer.imports.edit');
        
        Route::delete('destroy/{id}', 'destroy')->name('shop.mp_data_transfer.seller.account.seller_data_transfer.imports.delete');
        /** need to check */
        Route::get('create', 'create')->name('shop.mp_data_transfer.seller.account.seller_data_transfer.imports.create');
        
        Route::post('create', 'store')->name('shop.mp_data_transfer.seller.account.seller_data_transfer.imports.store');
        
        Route::put('update/{id}', 'update')->name('shop.mp_data_transfer.seller.account.seller_data_transfer.imports.update');

        Route::get('validate/{id}', 'validateImport')->name('shop.mp_data_transfer.seller.account.seller_data_transfer.imports.validate');

        Route::get('start/{id}', 'start')->name('shop.mp_data_transfer.seller.account.seller_data_transfer.imports.start');

        Route::get('link/{id}', 'link')->name('shop.mp_data_transfer.seller.account.seller_data_transfer.imports.link');

        Route::get('index/{id}', 'indexData')->name('shop.mp_data_transfer.seller.account.seller_data_transfer.imports.index_data');

        Route::get('stats/{id}/{state?}', 'stats')->name('shop.mp_data_transfer.seller.account.seller_data_transfer.imports.stats');

        Route::get('download-sample/{type?}', 'downloadSample')->name('shop.mp_data_transfer.seller.account.seller_data_transfer.imports.download_sample');

        Route::get('download-sample-images-zip/{type?}', 'downloadSampleImagesZip')->name('shop.mp_data_transfer.seller.account.seller_data_transfer.imports.download_sample_zip');
    });
});