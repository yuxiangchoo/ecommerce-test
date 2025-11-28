<?php

return [
    'default' => env('SMS_DRIVER', 'anchor'),
    'from'    => env('SMS_FROM', null),

    'drivers' => [
        'anchor' => [
            // env fallbacks if you don’t set via admin
            'mode'        => env('ANCHOR_MODE', 'no_token'),
            'base'        => env('ANCHOR_BASE', ''),
            'from'        => env('ANCHOR_FROM', null),
            'dataCoding'  => env('ANCHOR_DATA_CODING', '8'),
            'user'        => env('ANCHOR_USER', ''),
            'pass'        => env('ANCHOR_PASS', ''),
            'username'    => env('ANCHOR_USERNAME', ''),
            'password'    => env('ANCHOR_PASSWORD', ''),
            'token_path'  => env('ANCHOR_TOKEN_PATH', '/auth/getToken'),
            'mt_path'     => env('ANCHOR_MT_PATH', '/mt/sendMtSms'),
            'mt_no_token' => env('ANCHOR_MT_NO_TOKEN', '/mt/sendMtSmsNoToken'),
        ],
    ],
    'otp' => [
        'purpose'                => 'seller_register',
        'digits'                 => 6,
        'ttl_minutes'            => 5,
        'max_attempts'           => 5,
        'cooldown_seconds'       => 60,   // ⬅ user must wait this long to resend
        'rate_limit_window_min'  => 10,   // ⬅ lookback window for IP rate-limit
        'rate_limit_max_per_ip'  => 5,    // ⬅ max sends per IP per window
    ],

];

