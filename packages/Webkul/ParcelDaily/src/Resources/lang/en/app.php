<?php

return [
    'parcel-daily-shipping' => [
        'description' => 'Description',
        'page-title'  => 'Parcel Daily Shipping',
        'status'      => 'Status',
        'title'       => 'Title',
        'title-info'  => 'Parcel Daily Shipment is a shipping method where parcels are collected and dispatched on a daily basis. This ensures faster processing and more consistent delivery schedules. It is ideal for businesses with regular shipping needs, providing efficiency, reliability, and improved customer satisfaction through timely dispatches.',
        'token'       => 'Token',
        'merchant-id' => 'Merchant ID',
        'base-url'    => 'Base URL',
    ],
    'create-shipment' => [
        'shipment-mode' => 'Shipment Mode',
        'pick-up' => 'Pick Up',
        'drop-off' => 'Drop Off',
        'pd-mode-required' => 'Please select Shipment Mode.',
        'invalid-inventory-source' => 'Invalid inventory source.'
    ],
    'print-waybill' => 'Print Waybill',
    'no-connote'    => 'No consignment number found for this shipment.',
    'tracking' => [
        'title'   => 'Parcel Tracking',
        'provider'=> 'Service Provider',
        'status'  => 'Status',
        'date'    => 'Date',
        'place'   => 'Place',
        'close'   => 'Close',
    ],
    'cancel' => [
        'success' => 'Shipment cancellation requested with carrier.',
        'warning' => 'Could not cancel shipment with carrier: :msg',
    ],
];