<?php

return [
    'checkout' => [
        'cart' => [
            'integrity' => [
                'qty-missing' => 'Sekurang-kurangnya satu produk mesti mempunyai kuantiti lebih daripada 1.',
            ],

            'invalid-file-extension'   => 'Sambungan fail tidak sah ditemui.',
            'inventory-warning'        => 'Kuantiti yang diminta tidak tersedia, sila cuba lagi kemudian.',
            'missing-links'            => 'Produk ini tiada pautan muat turun.',
            'missing-options'          => 'Produk ini tiada pilihan.',
            'selected-products-simple' => 'Produk yang dipilih mestilah jenis mudah (simple).',
        ],
    ],

    'datagrid' => [
        'copy-of-slug'                  => 'salinan-:value',
        'copy-of'                       => 'Salinan :value',
        'variant-already-exist-message' => 'Variasi dengan pilihan atribut yang sama sudah wujud.',
    ],

    'response' => [
        'product-can-not-be-copied' => 'Produk dengan jenis :type tidak boleh disalin.',
    ],

    'sort-by' => [
        'options' => [
            'cheapest-first'  => 'Paling murah dahulu',
            'expensive-first' => 'Paling mahal dahulu',
            'from-a-z'        => 'Dari A hingga Z',
            'from-z-a'        => 'Dari Z hingga A',
            'latest-first'    => 'Terbaru dahulu',
            'oldest-first'    => 'Terlama dahulu',
        ],
    ],

    'type' => [
        'abstract' => [
            'offers' => 'Beli :qty pada harga :price setiap satu, jimat :discount setiap satu',
        ],

        'bundle'       => 'Jualan berkas',
        'booking'      => 'Tempahan',
        'configurable' => 'Boleh dikonfigurasi',
        'downloadable' => 'Boleh dimuat turun',
        'grouped'      => 'Berkumpulan',
        'simple'       => 'Mudah',
        'virtual'      => 'Maya',
    ],
];
