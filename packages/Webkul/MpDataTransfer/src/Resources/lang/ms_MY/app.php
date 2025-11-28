<?php

return [
    'admin' => [
        'data-transfer' => [
            'index' => [
                'title' => 'Import Pasaran'
            ],
            'imports' => [
                'index' => [
                    'button-title' => 'Cipta Import',
                    'back-btn'     => 'Kembali'
                ],
                'products' => [
                    'title' => 'Produk Penjual'
                ],
                'categories' => [
                    'title' => 'Kategori'
                ],
                'seller' => [
                    'categories' => [
                        'title' => 'Kategori Penjual'
                    ],
                ],
                'create' => [
                    'marketplace'   => 'Pasaran',
                    'set_seller'    => 'Tetapkan Penjual',
                    'select_seller' => 'Pilih Penjual',
                    'upload_images' => 'Muat naik Imej (Zip)',
                ]
            ]
        ],
        'menu' => [
            'data-transfer' => 'Pemindahan Data'
        ]
    ],
    'shop' => [
        'sellers' => [
            'account' => [
                'menu' => [
                    'seller-data-transfer' => 'Pemindahan Data'
                ],
                'seller-data-transfer' => [
                    'index' => [
                        'title' => 'Pemindahan Data',
                        'imports' => [
                            'index' => [
                                'button-title'      => 'Cipta Import',
                                'save-button-title' => 'Simpan Import',
                                'title'             => 'Import',
                                'back-btn'          => 'Kembali',
                                'datagrid' => [
                                    'import'        => 'Import',
                                    'edit'          => 'Sunting',
                                    'delete'        => 'Padam',
                                    'actions'       => 'Tindakan',
                                    'completed-at'  => 'Selesai Pada',
                                    'created'       => 'Dicipta',
                                    'deleted'       => 'Telah Dipadam',
                                    'error-file'    => 'Fail Ralat',
                                    'id'            => 'ID',
                                    'seller'        => 'Penjual',
                                    'started-at'    => 'Mula Pada',
                                    'state'         => 'Status',
                                    'summary'       => 'Ringkasan',
                                    'updated'       => 'Dikemas kini',
                                    'uploaded-file' => 'Fail Dimuat Naik',
                                ],
                            ],
                            'create' => [
                                'action'              => 'Tindakan',
                                'allowed-errors'      => 'Bilangan Ralat Dibenarkan',
                                'back-btn'            => 'Kembali',
                                'create-update'       => 'Cipta/Kemas Kini',
                                'delete'              => 'Padam',
                                'download-sample'     => 'Muat Turun Contoh',
                                'download-sample-zip' => 'Muat Turun Contoh Imej (Zip)',
                                'field-separator'     => 'Pemisah Medan',
                                'file-info-example'   => 'Contoh: imej produk perlu diletakkan dalam folder /project-root/storage/app/import/product-images.',
                                'file-info'           => 'Gunakan laluan relatif dari /project-root/storage/app/import, contoh: product-images, import-images.',
                                'file'                => 'Fail',
                                'general'             => 'Umum',
                                'images-directory'    => 'Laluan Direktori Imej',
                                'process-in-queue'    => 'Proses dalam Barisan',
                                'results'             => 'Keputusan',
                                'save-btn'            => 'Simpan Import',
                                'settings'            => 'Tetapan',
                                'skip-errors'         => 'Langkau Ralat',
                                'stop-on-errors'      => 'Hentikan Jika Berlaku Ralat',
                                'title'               => 'Cipta Import',
                                'type'                => 'Jenis',
                                'validation-strategy' => 'Strategi Validasi',
                                'upload_images'       => 'Muat naik Imej (Zip)',
                            ],
                            'edit' => [
                                'action'              => 'Tindakan',
                                'allowed-errors'      => 'Bilangan Ralat Dibenarkan',
                                'back-btn'            => 'Kembali',
                                'create-update'       => 'Cipta/Kemas Kini',
                                'delete'              => 'Padam',
                                'download-sample'     => 'Muat Turun Contoh',
                                'download-sample-zip' => 'Muat Turun Contoh Imej (Zip)',
                                'field-separator'     => 'Pemisah Medan',
                                'file-info-example'   => 'Contoh: imej produk perlu diletakkan dalam folder /project-root/storage/app/import/product-images.',
                                'file-info'           => 'Gunakan laluan relatif dari /project-root/storage/app/import, contoh: product-images, import-images.',
                                'file'                => 'Fail',
                                'general'             => 'Umum',
                                'images-directory'    => 'Laluan Direktori Imej',
                                'process-in-queue'    => 'Proses dalam Barisan',
                                'results'             => 'Keputusan',
                                'save-btn'            => 'Simpan Import',
                                'settings'            => 'Tetapan',
                                'skip-errors'         => 'Langkau Ralat',
                                'stop-on-errors'      => 'Hentikan Jika Berlaku Ralat',
                                'title'               => 'Sunting Import',
                                'type'                => 'Jenis',
                                'validation-strategy' => 'Strategi Validasi',
                            ],
                            'import' => [
                                'back-btn'                => 'Kembali',
                                'completed-batches'       => 'Jumlah Kumpulan Selesai:',
                                'download-error-report'   => 'Muat Turun Laporan Lengkap',
                                'edit-btn'                => 'Sunting',
                                'imported-info'           => 'Tahniah! Import anda berjaya.',
                                'importing-info'          => 'Import Sedang Diproses',
                                'indexing-info'           => 'Pengindeksan sumber (harga, stok & Elastic Search) sedang diproses',
                                'linking-info'            => 'Pautan sumber sedang diproses',
                                'progress'                => 'Kemajuan:',
                                'title'                   => 'Import',
                                'total-batches'           => 'Jumlah Kumpulan:',
                                'total-created'           => 'Jumlah Rekod Dicipta:',
                                'total-deleted'           => 'Jumlah Rekod Dipadam:',
                                'total-errors'            => 'Jumlah Ralat:',
                                'total-invalid-rows'      => 'Jumlah Baris Tidak Sah:',
                                'total-rows-processed'    => 'Jumlah Baris Diproses:',
                                'total-updated'           => 'Jumlah Rekod Dikemas Kini:',
                                'validate-info'           => 'Klik Validasi Data untuk menyemak import anda.',
                                'validate'                => 'Validasi',
                                'validating-info'         => 'Pembacaan & Validasi Data telah bermula',
                                'validation-failed-info'  => 'Import anda tidak sah. Sila betulkan ralat di bawah dan cuba lagi.',
                                'validation-success-info' => 'Import anda sah. Klik Import untuk memulakan proses.',
                            ],
                            'create-success'    => 'Import berjaya dicipta.',
                            'delete-failed'     => 'Padam import gagal.',
                            'delete-success'    => 'Import berjaya dipadam.',
                            'not-valid'         => 'Import tidak sah.',
                            'nothing-to-import' => 'Tiada sumber untuk diimport.',
                            'setup-queue-error' => 'Sila tukar pemacu barisan anda kepada "database" atau "redis" untuk memulakan proses import.',
                            'update-success'    => 'Import berjaya dikemas kini.',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'importers' => [
        'seller' => [
            'validation' => [
                'errors' => [
                    'not-found'              => 'Penjual tidak ditemui.',
                    'profile-fields-missing' => 'Medan profil penjual hilang: "%s".'
                ],
            ],
        ],
        'categories' => [
            'validation' => [
                'errors' => [
                    'duplicate-slug'           => 'Slug kategori: \'%s\' muncul lebih daripada sekali dalam fail import.',
                    'slug_not_found_to_delete' => 'Slug kategori: \'%s\' tidak ditemui dalam sistem.',
                    'invalid_display_mode'     => 'Mod paparan: \'%s\' tidak sah. Ia mesti salah satu daripada: products_and_description, products_only, description_only.',
                ],
            ],
        ],
    ],
];
