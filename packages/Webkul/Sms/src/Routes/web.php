<?php
use Illuminate\Support\Facades\Route;
use Webkul\Sms\Http\Controllers\Seller\OtpController; 
use Webkul\Sms\Http\Controllers\Seller\RegisterController;

// 🔎 quick ping to confirm this file is loaded
Route::get('/__otp_ping', fn () => 'sms routes loaded');

// 🔎 debug: see if named routes exist (visit in browser)
Route::get('/__otp_routes', function () {
    return response()->json([
        'has_send'   => \Route::has('seller.register.otp.send'),
        'has_verify' => \Route::has('seller.register.otp.verify'),
    ]);
});

Route::group([
    'middleware' => ['web'],
    'prefix'     => 'seller/register',
], function () {
    Route::post('/otp/send',   [OtpController::class, 'send'])->name('seller.register.otp.send');
    Route::post('/otp/verify', [OtpController::class, 'verify'])->name('seller.register.otp.verify');
});