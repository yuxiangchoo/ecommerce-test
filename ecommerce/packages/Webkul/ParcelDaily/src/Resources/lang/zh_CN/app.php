<?php

return [
    'parcel-daily-shipping' => [
        'description' => '描述',
        'page-title'  => '每日包裹配送',
        'status'      => '狀態',
        'title'       => '標題',
        'title-info'  => '每日包裹配送是一種每天收取並寄送包裹的配送方式。此方式可加快處理速度並提供更穩定的配送時程。非常適合有固定發貨需求的商家，提升效率、穩定性以及顧客滿意度。',
        'token'       => '令牌',
        'merchant-id' => '商戶 ID',
        'base-url'    => '基礎 URL',
    ],
    'create-shipment' => [
        'shipment-mode' => '配送模式',
        'pick-up'       => '取件',
        'drop-off'      => '寄件',
        'pd-mode-required' => '請選擇配送模式。',
        'invalid-inventory-source' => '無效的庫存來源。'
    ],
    'print-waybill' => '打印运单',
    'no-connote'    => '未找到此货件的运单号。',
    'tracking' => [
        'title'   => '包裹追踪',
        'provider'=> '服务提供商',
        'status'  => '状态',
        'date'    => '日期',
        'place'   => '地点',
        'close'   => '关闭',
    ],
    'cancel' => [
        'success' => '已向承运人请求取消货件。',
        'warning' => '无法取消承运人的货件: :msg',
    ],
];
