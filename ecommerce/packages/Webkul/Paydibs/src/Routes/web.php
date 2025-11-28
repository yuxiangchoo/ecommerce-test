<?php

use Illuminate\Support\Facades\Route;
use Webkul\Paydibs\Http\Controllers\PaymentController;

Route::group(['middleware' => ['web']], function () {
    Route::post('/paydibs/handle-callback', [PaymentController::class, 'handleCallback'])->name('paydibs.handle-callback');
    Route::get('/paydibs/redirect', [PaymentController::class, 'redirect'])->name('paydibs.redirect');
    Route::post('/paydibs/handle-redirect', [PaymentController::class, 'handleRedirect'])->name('paydibs.handle-redirect');
});

Route::post('paydibs/handle-redirect', [PaymentController::class, 'handleRedirect'])
    ->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class)
    ->name('paydibs.handle-redirect');

Route::post('paydibs/handle-callback', [PaymentController::class, 'handleCallback'])
    ->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class)
    ->name('paydibs.handle-callback');