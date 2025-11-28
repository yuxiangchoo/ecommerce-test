<?php

use Illuminate\Support\Facades\Route;
use Webkul\ParcelDaily\Http\Controllers\Seller\WaybillController;
use Webkul\ParcelDaily\Http\Controllers\TrackingController;

Route::prefix('seller')
    ->middleware(['web', 'marketplace', 'locale', 'theme', 'currency'])
    ->name('parceldaily.seller.') // <-- route name prefix
    ->group(function () {
        Route::get('shipments/{id}/print-waybill', [WaybillController::class, 'download'])
            ->name('shipments.print-waybill');
        Route::get('parcel-daily/tracking/{consignNo}', [TrackingController::class, 'show'])
            ->name('tracking.show');
    });
