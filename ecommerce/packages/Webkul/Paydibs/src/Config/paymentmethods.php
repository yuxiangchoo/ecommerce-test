<?php

return [
    'paydibs' => [
        'code'             => 'paydibs',
        'title'            => 'Visa/Master, FPX, E-Wallet',
        'description'      => 'Payment Channel',
        'client_id'        => 'sb',
        'class'            => 'Webkul\Paydibs\Payment\Paydibs',
        'sandbox'          => true,
        'active'           => true,
        'sort'             => 5,
    ]
];
