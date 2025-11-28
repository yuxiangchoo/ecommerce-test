<?php

return [
    'products' => [
        'title'                  => 'data_transfer::app.importers.products.title',
        'importer'               => 'Webkul\DataTransfer\Helpers\Importers\Product\Importer',
        'sample_path'            => 'data-transfer/samples/products.csv',
        'sample_images_zip_path' => 'mp-data-transfer/samples/product_images.zip',
        'sample_paths' => [
            'csv'  => 'data-transfer/samples/csv/products.csv',
            'xls'  => 'data-transfer/samples/xls/products.xls',
            'xlsx' => 'data-transfer/samples/xlsx/products.xlsx',
            'xml'  => 'data-transfer/samples/xml/products.xml',
        ],
    ],
    
    'categories' => [
        'title'                  => 'mp_data_transfer::app.admin.data-transfer.imports.categories.title',
        'importer'               => 'Webkul\MpDataTransfer\Helpers\Importers\Category\Importer',
        'sample_path'            => 'mp-data-transfer/samples/categories.csv',
        'sample_images_zip_path' => 'mp-data-transfer/samples/category_images.zip',
        'sample_paths' => [
            'csv'  => 'mp-data-transfer/samples/categories.csv',
        ],
    ],

    'seller_products' => [
        'title'                  => 'mp_data_transfer::app.admin.data-transfer.imports.products.title',
        'importer'               => 'Webkul\MpDataTransfer\Helpers\Importers\SellerProduct\Importer',
        'sample_path'            => 'mp-data-transfer/samples/seller_products.csv',
        'sample_images_zip_path' => 'mp-data-transfer/samples/product_images.zip',
        'sample_paths' => [
            'csv'  => 'mp-data-transfer/samples/seller_products.csv',
            'xls'  => 'mp-data-transfer/samples/seller_products.xls',
            'xlsx'  => 'mp-data-transfer/samples/seller_products.xlsx',
            'xml'  => 'mp-data-transfer/samples/seller_products.xml',
        ],
    ],

    'seller_categories' => [
        'title'                  => 'mp_data_transfer::app.admin.data-transfer.imports.seller.categories.title',
        'importer'               => 'Webkul\MpDataTransfer\Helpers\Importers\SellerCategory\Importer',
        'sample_path'            => 'mp-data-transfer/samples/categories.csv',
        'sample_images_zip_path' => 'mp-data-transfer/samples/category_images.zip',
        'sample_paths' => [
            'csv'  => 'mp-data-transfer/samples/categories.csv',
        ],
    ],
];
