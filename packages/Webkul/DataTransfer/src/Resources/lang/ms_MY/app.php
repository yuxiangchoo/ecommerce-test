<?php

return [
    'importers' => [
        'customers' => [
            'title' => 'Pelanggan',

            'validation' => [
                'errors' => [
                    'duplicate-email'        => "Emel: '%s' ditemui lebih daripada sekali dalam fail import.",
                    'duplicate-phone'        => "Telefon: '%s' ditemui lebih daripada sekali dalam fail import.",
                    'email-not-found'        => "Emel: '%s' tidak ditemui dalam sistem.",
                    'invalid-customer-group' => 'Kumpulan pelanggan tidak sah atau tidak disokong.',
                ],
            ],
        ],

        'products' => [
            'title' => 'Produk',

            'validation' => [
                'errors' => [
                    'duplicate-url-key'         => "Kunci URL: '%s' telah dijana untuk SKU: '%s'.",
                    'invalid-attribute-family'  => 'Nilai dalam lajur keluarga atribut tidak sah atau tidak disokong.',
                    'invalid-type'              => 'Jenis produk tidak sah atau tidak disokong.',
                    'sku-not-found'             => 'Produk dengan SKU yang ditentukan tidak ditemui.',
                    'super-attribute-not-found' => "Atribut super dengan kod '%s' tidak ditemui atau tidak tergolong dalam kumpulan atribut: '%s'.",
                ],
            ],
        ],

        'tax-rates' => [
            'title' => 'Kadar Cukai',

            'validation' => [
                'errors' => [
                    'duplicate-identifier' => "Pengecam: '%s' ditemui lebih daripada sekali dalam fail import.",
                    'identifier-not-found' => "Pengecam: '%s' tidak ditemui dalam sistem.",
                ],
            ],
        ],
    ],

    'validation' => [
        'errors' => [
            'column-empty-headers' => 'Tajuk lajur pada lajur "%s" adalah kosong.',
            'column-name-invalid'  => 'Nama lajur tidak sah: "%s".',
            'column-not-found'     => 'Lajur yang diperlukan tidak ditemui: %s.',
            'column-numbers'       => 'Bilangan lajur tidak sepadan dengan bilangan baris pada baris tajuk.',
            'invalid-attribute'    => 'Tajuk mengandungi atribut tidak sah: "%s".',
            'system'               => 'Ralat sistem yang tidak dijangka berlaku.',
            'wrong-quotes'         => 'Tanda petikan melengkung digunakan bukannya tanda petikan lurus.',
        ],
    ],
];
