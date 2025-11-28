<?php

use Illuminate\Support\Facades\Route;
use Webkul\Sms\Http\Controllers\Seller\OtpController;

Route::get('/__otp_ping', fn() => 'sms routes loaded');

Route::group([
    'middleware' => ['web'],
    'prefix'     => 'seller/register',
], function () {
    Route::post('/otp/send',   [OtpController::class, 'send'])->name('seller.register.otp.send');
    Route::post('/otp/verify', [OtpController::class, 'verify'])->name('seller.register.otp.verify');
});
