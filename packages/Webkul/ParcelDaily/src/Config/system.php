<?php

use Webkul\Sales\Models\Order;

return [
    [
        'key'    => 'sales.carriers.parceldaily',
        'name'   => 'parceldaily::app.parcel-daily-shipping.page-title',
        'info'   => 'parceldaily::app.parcel-daily-shipping.title-info',
        'sort'   => 3,
        'fields' => [
            [
                'name'          => 'title',
                'title'         => 'parceldaily::app.parcel-daily-shipping.title',
                'type'          => 'text',
                'depends'       => 'active:1',
                'validation'    => 'required_if:active,1',
                'channel_based' => true,
                'locale_based'  => true,
            ], [
                'name'          => 'description',
                'title'         => 'parceldaily::app.parcel-daily-shipping.description',
                'type'          => 'textarea',
                'channel_based' => true,
                'locale_based'  => true,
            ], [
                'name'          => 'base_url',
                'title'         => 'parceldaily::app.parcel-daily-shipping.base-url',
                'type'          => 'text',
                'depends'       => 'active:1',
                'validation'    => 'required_if:active,1',
                'channel_based' => true,
                'locale_based'  => false,
            ], [
                'name'          => 'token',
                'title'         => 'parceldaily::app.parcel-daily-shipping.token',
                'type'          => 'text',
                'depends'       => 'active:1',
                'validation'    => 'required_if:active,1',
                'channel_based' => true,
                'locale_based'  => false,
            ], [
                'name'          => 'merchant_id',
                'title'         => 'parceldaily::app.parcel-daily-shipping.merchant-id',
                'type'          => 'text',
                'depends'       => 'active:1',
                'validation'    => 'required_if:active,1',
                'channel_based' => true,
                'locale_based'  => false,
            ], [
                'name'          => 'active',
                'title'         => 'parceldaily::app.parcel-daily-shipping.status',
                'type'          => 'boolean',
                'channel_based' => true,
                'locale_based'  => false,
            ],
        ],
    ],
];
