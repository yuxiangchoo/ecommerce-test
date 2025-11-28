<?php

use Illuminate\Support\Facades\Route;
use Webkul\ParcelDaily\Http\Controllers\TrackingController;

Route::prefix('parcel-daily')
    ->middleware(['web', 'theme', 'locale', 'currency', 'customer']) // buyer area
    ->name('parceldaily.shop.')
    ->group(function () {
        Route::get('tracking/{consignNo}', [TrackingController::class, 'show'])
            ->name('tracking.show');
    });
