<?php

return [
    'admin' => [
        'configuration' => [
            'index' => [
                'marketplace' => [
                    'title' => 'Marketplace',
                    'info'  => 'Urus Marketplace',

                    'module-info' => [
                        'title'       => 'Maklumat Modul',
                        'info'        => 'Memberi maklumat berkaitan versi aplikasi.',
                        'app-version' => 'Versi Aplikasi:- v2.3.0',
                    ],

                    'general' => [
                        'admin-commission-percentage'  => 'Peratus Komisen Admin',
                        'description'                  => 'Urus tetapan umum Marketplace seperti status, komisen, dsb.',
                        'lines-in-street-address'      => 'Bilangan Baris Alamat',
                        'lines-in-street-address-info' => 'Tetapkan bilangan baris untuk alamat jalan. Lalai satu baris.',
                        'status'                       => 'Status',
                        'title'                        => 'Umum',
                    ],

                    'product' => [
                        'approval-required'         => 'Perlu Kelulusan',
                        'description'               => 'Urus tetapan produk seperti kelulusan, bendera, dsb.',
                        'enable-flag'               => 'Aktifkan Bendera',
                        'seller-can-assign-product' => 'Penjual Boleh Tugaskan Produk',
                        'seller-can-create-product' => 'Penjual Boleh Cipta Produk',
                        'show-progress-bar'         => 'Tunjuk Bar Kemajuan',
                        'title'                     => 'Produk',
                    ],

                    'seller' => [
                        'approval-required'           => 'Perlu Kelulusan',
                        'can-cancel-order'            => 'Boleh Batalkan Pesanan',
                        'can-create-invoice'          => 'Boleh Cipta Invois',
                        'can-create-shipment'         => 'Boleh Cipta Penghantaran',
                        'description'                 => 'Urus tetapan penjual seperti kelulusan, bendera, dsb.',
                        'enable-flag'                 => 'Aktifkan Bendera',
                        'enable-minimum-order-amount' => 'Aktifkan Amaun Pesanan Minimum',
                        'enable-seller-flag'          => 'Aktifkan Bendera Penjual',
                        'red-flag-limit'              => 'Had Bendera Merah',
                        'red-flag-limit-info'         => 'Jika penjual melebihi had ini, bendera merah akan dipaparkan pada profil.',
                        'show-red-flag'               => 'Tunjuk bendera merah pada profil jika had melebihi',
                        'title'                       => 'Penjual',
                    ],

                    'featured-sellers' => [
                        'limit-count' => 'Had Bilangan',
                        'description' => 'Urus penjual terpilih di Marketplace.',
                        'status'      => 'Status',
                        'title'       => 'Penjual Terpilih',

                        'popularity-criteria' => [
                            'all'              => 'Semua',
                            'maximum-orders'   => 'Pesanan Tertinggi',
                            'maximum-products' => 'Produk Terbanyak',
                            'maximum-rating'   => 'Penilaian Tertinggi',
                            'maximum-sale'     => 'Jualan Tertinggi',
                            'title'            => 'Kriteria Populariti',
                        ],
                    ],

                    'landing-page' => [
                        'banner-btn-title'    => 'Tajuk Butang Sepanduk',
                        'banner-description'  => 'Penerangan Sepanduk',
                        'banner-image'        => 'Imej Sepanduk',
                        'banner-title'        => 'Tajuk Sepanduk',
                        'business-hour'       => 'Waktu Perniagaan',
                        'community-count'     => 'Bilangan Komuniti',
                        'description'         => 'Ubah suai halaman pendaratan Marketplace dengan ikon, sepanduk dan penerangan.',
                        'feature-box1-desc'   => 'Penerangan Kotak Ciri 1',
                        'feature-box1-icon'   => 'Ikon Kotak Ciri 1',
                        'feature-box1-title'  => 'Tajuk Kotak Ciri 1',
                        'feature-box2-desc'   => 'Penerangan Kotak Ciri 2',
                        'feature-box2-icon'   => 'Ikon Kotak Ciri 2',
                        'feature-box2-title'  => 'Tajuk Kotak Ciri 2',
                        'feature-box3-desc'   => 'Penerangan Kotak Ciri 3',
                        'feature-box3-icon'   => 'Ikon Kotak Ciri 3',
                        'feature-box3-title'  => 'Tajuk Kotak Ciri 3',
                        'feature-box4-desc'   => 'Penerangan Kotak Ciri 4',
                        'feature-box4-icon'   => 'Ikon Kotak Ciri 4',
                        'feature-box4-title'  => 'Tajuk Kotak Ciri 4',
                        'feature-description' => 'Penerangan Ciri',
                        'feature-image'       => 'Imej Ciri',
                        'feature-title'       => 'Tajuk Ciri',
                        'journey-description' => 'Penerangan Perjalanan',
                        'journey-image'       => 'Imej Perjalanan',
                        'journey-step1-desc'  => 'Penerangan Langkah 1',
                        'journey-step1-icon'  => 'Ikon Langkah 1',
                        'journey-step1-title' => 'Tajuk Langkah 1',
                        'journey-step2-desc'  => 'Penerangan Langkah 2',
                        'journey-step2-icon'  => 'Ikon Langkah 2',
                        'journey-step2-title' => 'Tajuk Langkah 2',
                        'journey-step3-desc'  => 'Penerangan Langkah 3',
                        'journey-step3-icon'  => 'Ikon Langkah 3',
                        'journey-step3-title' => 'Tajuk Langkah 3',
                        'journey-step4-desc'  => 'Penerangan Langkah 4',
                        'journey-step4-icon'  => 'Ikon Langkah 4',
                        'journey-step4-title' => 'Tajuk Langkah 4',
                        'journey-step5-desc'  => 'Penerangan Langkah 5',
                        'journey-step5-icon'  => 'Ikon Langkah 5',
                        'journey-step5-title' => 'Tajuk Langkah 5',
                        'journey-title'       => 'Tajuk Perjalanan',
                        'payment-duration'    => 'Tempoh Pembayaran',
                        'serviceable-pincode' => 'Poskod Diliputi',
                        'title'               => 'Halaman Pendaratan',
                    ],
                ],
            ],
        ],

        'acl' => [
            'assign-product'    => 'Tugaskan Produk',
            'communications'    => 'Komunikasi',
            'create'            => 'Cipta',
            'delete'            => 'Padam',
            'edit'              => 'Sunting',
            'flag-reasons'      => 'Sebab Bendera',
            'inventory-sources' => 'Sumber Inventori',
            'orders'            => 'Pesanan',
            'pay'               => 'Bayar',
            'payment-request'   => 'Permintaan Pembayaran',
            'product-reviews'   => 'Ulasan Produk',
            'products'          => 'Produk',
            'reviews'           => 'Ulasan Penjual',
            'seller-categories' => 'Kategori Penjual',
            'sellers'           => 'Penjual',
            'title'             => 'Marketplace',
            'transactions'      => 'Transaksi',
            'view'              => 'Lihat',
        ],

        'menu' => [
            'communications'    => 'Komunikasi',
            'flag-reasons'      => 'Sebab Bendera',
            'inventory-sources' => 'Sumber Inventori',
            'orders'            => 'Pesanan',
            'payment-requests'  => 'Permintaan Pembayaran',
            'product-reviews'   => 'Ulasan Produk',
            'products'          => 'Produk',
            'seller-categories' => 'Kategori Penjual',
            'seller-reviews'    => 'Ulasan Penjual',
            'sellers'           => 'Penjual',
            'title'             => 'Marketplace',
            'transactions'      => 'Transaksi',
        ],
    ],

    /* -------------------- Seller Area (Storefront) -------------------- */

    'seller' => [
        'menu' => [
            'bookings'          => 'Tempahan',
            'communication'     => 'Komunikasi',
            'customers'         => 'Pelanggan',
            'dashboard'         => 'Papan Pemuka',
            'extensions'        => 'Sambungan',
            'general'           => 'Umum',
            'inventory-sources' => 'Sumber Inventori',
            'manage-profile'    => 'Urus Profil',
            'orders'            => 'Pesanan',
            'product-reviews'   => 'Ulasan Produk',
            'products'          => 'Produk',
            'reporting'         => 'Laporan',
            'roles'             => 'Peranan',
            'sales'             => 'Jualan',
            'seller-reviews'    => 'Ulasan Penjual',
            'settings'          => 'Tetapan',
            'transaction'       => 'Transaksi',
            'users'             => 'Pengguna',
        ],

        'login' => [
            'bagisto'             => 'Bagisto',
            'button-title'        => 'Log Masuk',
            'create-your-account' => 'Cipta akaun anda',
            'email'               => 'Emel',
            'footer'              => '© Hak Cipta 2025 - :current_year, TRI TETRA SDN BHD  202501012341 (1613755-U). Hak cipta terpelihara.',
            'forgot-pass'         => 'Lupa Kata Laluan?',
            'form-login-text'     => 'Jika anda mempunyai akaun, log masuk dengan emel anda.',
            'invalid-credentials' => 'Sila semak kelayakan anda dan cuba lagi.',
            'new-seller'          => 'Penjual baharu?',
            'not-approved'        => 'Akaun anda memerlukan kelulusan admin',
            'page-title'          => 'Log Masuk Penjual',
            'password'            => 'Kata Laluan',
            'show-password'       => 'Tunjuk Kata Laluan',
            'suspended-message'   => 'Akaun anda digantung. Hubungi admin.',
            'title'               => 'Log Masuk',
        ],

        'signup' => [
            'account-exists'   => 'Sudah mempunyai akaun?',
            'bagisto'          => 'Bagisto',
            'button-title'     => 'Daftar',
            'confirm-pass'     => 'Sahkan Kata Laluan',
            'email'            => 'Emel',
            'phone-number'     => 'Nombor Telefon',
            'footer'           => '© Hak Cipta 2025 - :current_year, TRI TETRA SDN BHD  202501012341 (1613755-U). Hak cipta terpelihara.',
            'form-signup-text' => 'Jika anda baharu di kedai kami, kami gembira menerima anda sebagai ahli.',
            'name'             => 'Nama',
            'page-title'       => 'Jadi Penjual',
            'password'         => 'Kata Laluan',
            'sign-in-button'   => 'Log Masuk',
            'success'          => 'Akaun berjaya dicipta.',
            'url'              => 'URL Kedai',
            'url-tooltip'      => 'Masukkan nama URL unik kedai anda. Contoh: jika anda taip example123, pautan kedai: marketplace.com/example123',

            'send-otp'         => 'Hantar OTP',
            'verify-otp'       => 'Sahkan OTP',
            'otp'              => 'OTP',

            /* OTP helper messages used by your JS */
            'enter-phone-first' => 'Sila masukkan nombor telefon anda terlebih dahulu.',
            'otp-sent'          => 'OTP telah dihantar.',
            'otp-send-failed'   => 'Gagal menghantar OTP.',
            'network-error'     => 'Ralat rangkaian. Sila cuba lagi.',
            'send-otp-first'    => 'Sila hantar OTP dahulu.',
            'enter-otp'         => 'Sila masukkan OTP.',
            'otp-verified'      => 'OTP disahkan.',
            'otp-invalid'       => 'OTP tidak sah.',
            'phone-already-registered' => 'Nombor telefon ini telah didaftarkan.',
            'otp-too-soon'          => 'Sila tunggu sebelum meminta OTP yang baharu.',
            'too-many-requests'     => 'Terlalu banyak permintaan OTP. Sila cuba lagi nanti.',
        ],
    ],

    /* ------------------------- Shop (Frontend) ------------------------ */

    'shop' => [
        'layout' => [
            'header' => [
                'seller-logo'     => 'Logo Penjual',
                'switch-to-store' => 'Tukar untuk urus kedai',
            ],
        ],

        'checkout' => [
            'cart' => [
                'minimum-order-message' => 'Amaun pesanan minimum untuk :shop_title ialah',
                'product-not-available' => 'Produk tidak tersedia',
                'sold-by'               => 'Dijual Oleh',
            ],
        ],

        'marketplace' => [
            'index' => [
                'days-payment'        => 'Hari* Pembayaran',
                'deals-in'            => 'Berniaga Dalam',
                'featured-seller'     => 'Penjual Terpilih Kami',
                'online-business'     => 'Perniagaan Atas Talian',
                'reviews'             => ':count Ulasan',
                'seller-community'    => 'Komuniti Penjual',
                'serviceable-pincode' => 'Poskod Diliputi',
                'start-selling'       => 'Mula berniaga dengan pelanggan di seluruh dunia, 24/7.',
                'step'                => 'Langkah :count',
                'visit-shop'          => 'Lawati Kedai',
            ],
        ],

        'products' => [
            'add-to-cart'   => 'Tambah ke Troli',
            'delivery-info' => 'Maklumat penghantaran dipaparkan di sini',
            'hide'          => 'Sembunyi',
            'more-info'     => 'Maklumat Lanjut',
            'seller-count'  => ':count penjual lagi menjual produk yang sama',
            'seller-info'   => 'Maklumat Penjual',
            'sold-by'       => 'Dijual Oleh',
            'top-selling'   => 'Paling Laris',

            'flag' => [
                'alert'              => 'Amaran',
                'already-reported'   => 'Anda sudah melaporkan produk ini',
                'create-success'     => 'Produk berjaya dilaporkan',
                'guest-alert'        => 'Anda perlu log masuk untuk melaporkan produk ini',
                'not-allowed'        => 'Anda tidak boleh melaporkan produk tanpa membuat pesanan',
                'other-reason'       => 'Sebab Lain',
                'reason'             => 'Sebab',
                'reason-placeholder' => 'Sila nyatakan sebab',
                'report-product'     => 'Laporkan Produk',
                'select-reason'      => 'Pilih Sebab',
                'submit-btn'         => 'Hantar',
            ],
        ],

        'sellers' => [
            'profile' => [
                'not-approved'    => 'Penjual belum diluluskan',
                'products-count'  => 'Produk (:count)',
                'reviews-count'   => 'Ulasan (:count)',
                'search-text'     => 'Cari Produk',

                'about' => [
                    'title'           => 'Perihal',
                    'about-us'        => 'Tentang Kami',
                    'shipping-policy' => 'Polisi Penghantaran',
                    'privacy-policy'  => 'Polisi Privasi',
                    'return-policy'   => 'Polisi Pemulangan',
                ],

                'contact-form' => [
                    'title'          => 'Hubungi',
                    'name'           => 'Nama',
                    'email'          => 'Emel',
                    'subject'        => 'Subjek',
                    'query'          => 'Pertanyaan',
                    'submit-btn'     => 'Hantar',
                    'create-success' => 'Pertanyaan anda berjaya dihantar',
                ],

                'share' => [
                    'title'     => 'Kongsi',
                    'share-on'  => 'Kongsi Di',
                    'facebook'  => 'facebook',
                    'linkedin'  => 'linkedin',
                    'twitter'   => 'twitter',
                    'pinterest' => 'pinterest',
                ],

                'report-form' => [
                    'alert'              => 'Amaran',
                    'already-reported'   => 'Anda telah melaporkan penjual ini',
                    'create-success'     => 'Penjual berjaya dilaporkan',
                    'guest-alert'        => 'Anda perlu log masuk untuk melaporkan penjual.',
                    'not-allowed'        => 'Anda tidak boleh melaporkan penjual tanpa membuat pesanan',
                    'other-reason'       => 'Sebab Lain',
                    'reason'             => 'Sebab',
                    'reason-placeholder' => 'Sila nyatakan sebab',
                    'select-reason'      => 'Pilih Sebab',
                    'submit-btn'         => 'Hantar',
                    'title'              => 'Lapor Isu',
                ],

                'reviews' => [
                    'alert'            => 'Amaran',
                    'already-reviewed' => 'Anda telah mengulas penjual ini',
                    'comment'          => 'Komen',
                    'create-success'   => 'Ulasan berjaya dihantar',
                    'customer-review'  => ':count Ulasan Pelanggan',
                    'customer-reviews' => 'Ulasan Pelanggan',
                    'guest-alert'      => 'Anda perlu log masuk untuk mengulas penjual',
                    'rating'           => 'Penilaian',
                    'review-by'        => 'Diulas Oleh',
                    'submit-btn'       => 'Hantar',
                    'title'            => 'Tajuk',
                    'view-all'         => 'Lihat Semua Ulasan',
                    'write-review'     => 'Tulis Ulasan',
                ],

                'products' => [
                    'no-result' => 'Tiada produk tersedia di sini',
                    'show'      => 'Tunjuk',

                    'sort-by' => [
                        'title' => 'Isih Mengikut',

                        'options' => [
                            'cheapest-first'  => 'Paling Murah Dahulu',
                            'expensive-first' => 'Paling Mahal Dahulu',
                            'from-a-z'        => 'A ke Z',
                            'from-z-a'        => 'Z ke A',
                            'latest-first'    => 'Terbaru Dahulu',
                            'oldest-first'    => 'Terlama Dahulu',
                        ],
                    ],

                    'filters' => [
                        'clear-all'   => 'Padam Semua',
                        'filter'      => 'Tapis',
                        'filters'     => 'Penapis:',
                        'price-range' => 'Julat Harga',
                        'sort'        => 'Isih',
                    ],
                ],
            ],
        ],
    ],
];

