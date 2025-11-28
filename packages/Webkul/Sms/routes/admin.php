<?php

use Illuminate\Support\Facades\Route;
use Webkul\Sms\Http\Controllers\Admin\TestController;

Route::middleware(['web'])                 // keep simple while testing; add 'admin' later
    ->prefix('admin/sms')
    ->group(function () {
        Route::get('/ping', fn () => 'sms ok')->name('admin.sms.ping');

        // Test page
        Route::get('/test',  [TestController::class, 'index'])->name('admin.sms.test.form');
        Route::post('/test', [TestController::class, 'send'])->name('admin.sms.test');
    });