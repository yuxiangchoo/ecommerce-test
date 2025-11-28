<?php

return [
    'admin' => [
        'configuration' => [
            'index' => [
                'marketplace' => [
                    'title' => 'Pasaran',
                    'info'  => 'Urus Pasaran',

                    'module-info' => [
                        'title'       => 'Maklumat Modul',
                        'info'        => 'Memberi maklumat tentang versi aplikasi.',
                        'app-version' => 'Versi Aplikasi: v2.3.0',
                    ],

                    'general' => [
                        'admin-commission-percentage'  => 'Peratusan Komisen Admin',
                        'description'                  => 'Tetapan umum untuk mengurus pasaran seperti status, komisen dan lain-lain.',
                        'lines-in-street-address'      => 'Bilangan Baris Alamat Jalan',
                        'lines-in-street-address-info' => 'Tetapkan bilangan baris alamat. Lalai ialah satu baris.',
                        'status'                       => 'Status',
                        'title'                        => 'Umum',
                    ],

                    'product' => [
                        'approval-required'         => 'Perlu Kelulusan',
                        'description'               => 'Urus tetapan produk pasaran seperti kelulusan, bendera dan lain-lain.',
                        'enable-flag'               => 'Aktifkan Bendera',
                        'seller-can-assign-product' => 'Penjual boleh tetapkan produk',
                        'seller-can-create-product' => 'Penjual boleh cipta produk',
                        'show-progress-bar'         => 'Tunjuk Bar Kemajuan',
                        'title'                     => 'Produk',
                    ],

                    'seller' => [
                        'approval-required'           => 'Perlu Kelulusan',
                        'can-cancel-order'            => 'Boleh Batalkan Pesanan',
                        'can-create-invoice'          => 'Boleh Cipta Invois',
                        'can-create-shipment'         => 'Boleh Cipta Penghantaran',
                        'description'                 => 'Urus tetapan penjual pasaran seperti kelulusan, bendera dan lain-lain.',
                        'enable-flag'                 => 'Aktifkan Bendera',
                        'enable-minimum-order-amount' => 'Aktifkan Jumlah Pesanan Minimum',
                        'enable-seller-flag'          => 'Aktifkan Bendera Penjual',
                        'red-flag-limit'              => 'Had Bendera Merah',
                        'red-flag-limit-info'         => 'Jika penjual melebihi had ini, bendera merah akan dipaparkan dalam profil penjual.',
                        'show-red-flag'               => 'Tunjuk bendera merah dalam profil jika melebihi had',
                        'title'                       => 'Penjual',
                    ],

                    'featured-sellers' => [
                        'limit-count' => 'Had Bilangan',
                        'description' => 'Urus penjual pilihan pasaran.',
                        'status'      => 'Status',
                        'title'       => 'Penjual Pilihan',

                        'popularity-criteria' => [
                            'all'              => 'Semua',
                            'maximum-orders'   => 'Pesanan Maksimum',
                            'maximum-products' => 'Produk Maksimum',
                            'maximum-rating'   => 'Penilaian Tertinggi',
                            'maximum-sale'     => 'Jualan Maksimum',
                            'title'            => 'Kriteria Populariti',
                        ],
                    ],

                    'landing-page' => [
                        'banner-btn-title'    => 'Tajuk Butang Sepanduk',
                        'banner-description'  => 'Deskripsi Sepanduk',
                        'banner-image'        => 'Imej Sepanduk',
                        'banner-title'        => 'Tajuk Sepanduk',
                        'business-hour'       => 'Waktu Perniagaan',
                        'community-count'     => 'Bilangan Komuniti',
                        'description'         => 'Sesuaikan halaman utama pasaran dengan menambah ikon, sepanduk, dan deskripsi.',
                        'feature-box1-desc'   => 'Deskripsi Kotak Ciri 1',
                        'feature-box1-icon'   => 'Ikon Kotak Ciri 1',
                        'feature-box1-title'  => 'Tajuk Kotak Ciri 1',
                        'feature-box2-desc'   => 'Deskripsi Kotak Ciri 2',
                        'feature-box2-icon'   => 'Ikon Kotak Ciri 2',
                        'feature-box2-title'  => 'Tajuk Kotak Ciri 2',
                        'feature-box3-desc'   => 'Deskripsi Kotak Ciri 3',
                        'feature-box3-icon'   => 'Ikon Kotak Ciri 3',
                        'feature-box3-title'  => 'Tajuk Kotak Ciri 3',
                        'feature-box4-desc'   => 'Deskripsi Kotak Ciri 4',
                        'feature-box4-icon'   => 'Ikon Kotak Ciri 4',
                        'feature-box4-title'  => 'Tajuk Kotak Ciri 4',
                        'feature-description' => 'Deskripsi Ciri',
                        'feature-image'       => 'Imej Ciri',
                        'feature-title'       => 'Tajuk Ciri',
                        'journey-description' => 'Deskripsi Perjalanan',
                        'journey-image'       => 'Imej Perjalanan',
                        'journey-step1-desc'  => 'Deskripsi Langkah 1',
                        'journey-step1-icon'  => 'Ikon Langkah 1',
                        'journey-step1-title' => 'Tajuk Langkah 1',
                        'journey-step2-desc'  => 'Deskripsi Langkah 2',
                        'journey-step2-icon'  => 'Ikon Langkah 2',
                        'journey-step2-title' => 'Tajuk Langkah 2',
                        'journey-step3-desc'  => 'Deskripsi Langkah 3',
                        'journey-step3-icon'  => 'Ikon Langkah 3',
                        'journey-step3-title' => 'Tajuk Langkah 3',
                        'journey-step4-desc'  => 'Deskripsi Langkah 4',
                        'journey-step4-icon'  => 'Ikon Langkah 4',
                        'journey-step4-title' => 'Tajuk Langkah 4',
                        'journey-step5-desc'  => 'Deskripsi Langkah 5',
                        'journey-step5-icon'  => 'Ikon Langkah 5',
                        'journey-step5-title' => 'Tajuk Langkah 5',
                        'journey-title'       => 'Tajuk Perjalanan',
                        'payment-duration'    => 'Tempoh Pembayaran',
                        'serviceable-pincode' => 'Poskod Dilayan',
                        'title'               => 'Halaman Utama',
                    ],
                ],
            ],
        ],
    ],

    'commands' => [
        'install' => [
            'description' => 'Pasang pakej Marketplace.',
            'migrate'     => 'Migrasikan semua jadual ke dalam pangkalan data (akan ambil sedikit masa)...',
            'seed'        => 'Masukkan data ke dalam pangkalan data...',
            'publish'     => 'Terbitkan sumber dan konfigurasi...',
            'cache'       => 'Kosongkan cache...',
            'finish'      => 'Pakej Marketplace telah berjaya dipasang.',
        ],

        'version' => [
            'description' => 'Papar versi semasa pakej Marketplace.',
            'comment'     => 'Versi Marketplace: :version',
        ],
    ],

    'emails' => [
        'dear'        => 'Yang Dihormati :customer_name',
        'dear-admin'  => 'Yang Dihormati Pentadbir',
        'dear-seller' => 'Yang Dihormati Penjual',

        'seller' => [
            'registration' => [
                'date'        => 'Tarikh Pendaftaran:',
                'description' => 'Kami dengan sukacitanya memaklumkan bahawa seorang penjual baru telah mendaftar di platform kami. Luangkan sedikit masa untuk mengalu-alukan penjual ini menyertai platform kami.',
                'details'     => 'Butiran adalah seperti berikut:',
                'email'       => 'Alamat E-mel:',
                'greeting'    => 'Semoga mesej ini sampai kepada anda.',
                'name'        => 'Nama Penjual:',
                'shop'        => 'URL Kedai:',
                'subject'     => 'Pendaftaran Penjual Baharu',
            ],

            'forgot-password' => [
                'description'    => 'Anda menerima e-mel ini kerana kami menerima permintaan untuk menetapkan semula kata laluan akaun anda.',
                'greeting'       => 'Lupa Kata Laluan!',
                'reset-password' => 'Tetapkan Semula Kata Laluan',
                'subject'        => 'E-mel Tetapan Semula Kata Laluan',
            ],

            'welcome' => [
                'description' => 'Selamat datang ke keluarga kami! Kami gembira dengan penyertaan anda sebagai penjual yang memberi nilai besar kepada platform ini dan menantikan kerjasama yang berjaya.',
                'greeting'    => 'Selamat datang dan terima kasih kerana mendaftar!',
                'subject'     => 'Notis Selamat Datang Penjual',
            ],

            'approval' => [
                'approved'    => 'Permohonan anda untuk menjadi penjual telah diluluskan.',
                'disapproved' => 'Permohonan anda untuk menjadi penjual telah ditolak.',
                'greeting'    => 'Selamat datang dan terima kasih kerana mendaftar!',
                'subject'     => 'Notis Kelulusan Penjual',
            ],

            'update' => [
                'description' => 'Profil anda telah berjaya dikemas kini.',
                'greeting'    => 'Semoga mesej ini sampai kepada anda.',
                'subject'     => 'Notis Kemas Kini Profil Penjual',
            ],

            'good-bye' => [
                'description' => 'Bekerjasama dengan anda adalah satu penghormatan. Saya amat menghargai profesionalisme, dedikasi, serta kualiti produk/perkhidmatan anda. Komitmen anda memastikan kepuasan pelanggan tidak pernah terlepas pandang dan merupakan faktor penting dalam pengalaman positif kami.',
                'greeting'    => 'Semoga mesej ini sampai kepada anda.',
                'subject'     => 'Notis Perpisahan Penjual',
            ],

            'product-approval' => [
                'approved'    => 'Produk anda :name telah diluluskan.',
                'disapproved' => 'Produk anda :name tidak diluluskan.',
                'greeting'    => 'Selamat datang dan terima kasih kerana mendaftar dengan kami!',
                'subject'     => 'Notis Kelulusan Produk Penjual',
            ],

            'orders' => [
                'created' => [
                    'greeting' => 'Anda mempunyai pesanan baharu: Nombor Pesanan :order_id, dibuat pada :created_at',
                    'subject'  => 'Pengesahan Pesanan Baharu',
                    'summary'  => 'Ringkasan Pesanan',
                    'title'    => 'Pesanan Disahkan!',
                ],

                'canceled' => [
                    'greeting' => 'Pesanan :order_id telah dibatalkan',
                    'subject'  => 'Pengesahan Pembatalan Pesanan',
                    'summary'  => 'Ringkasan Pesanan',
                    'title'    => 'Pesanan Dibatalkan!',
                ],

                'billing-address'   => 'Alamat Bil',
                'contact'           => 'Maklumat Hubungan',
                'discount'          => 'Diskaun',
                'grand-total'       => 'Jumlah Keseluruhan',
                'name'              => 'Nama',
                'payment'           => 'Pembayaran',
                'price'             => 'Harga',
                'qty'               => 'Kuantiti',
                'shipping'          => 'Penghantaran',
                'shipping-address'  => 'Alamat Penghantaran',
                'shipping-handling' => 'Penghantaran & Pengendalian',
                'sku'               => 'No. SKU',
                'subtotal'          => 'Jumlah Kecil',
                'tax'               => 'Cukai',
            ],

            'payment-request' => [
                'greeting'  => 'Semoga mesej ini sampai kepada anda.',
                'paid'      => 'Hai.. Anda telah menerima pembayaran untuk pesanan :order_id.',
                'requested' => 'Penjual :seller_name diminta untuk membuat pembayaran bagi pesanan :order_id.',
                'subject'   => 'Notis Permintaan Pembayaran Penjual',
            ],
        ],

        'contact-seller' => [
            'email'    => 'E-mel:- :email',
            'greeting' => 'Semoga mesej ini sampai kepada anda.',
            'info'     => 'Hai, :name mempunyai soalan untuk anda. Sila rujuk butiran di bawah.',
            'query'    => 'Pertanyaan:- :query',
            'subject'  => 'Notis Hubungi Penjual',
            'topic'    => 'Topik:- :subject',
        ],

        'report-product' => [
            'admin-msg'  => 'Hai, ":name" telah melaporkan produk ":product_name" daripada penjual ":seller_name". Sila semak butiran di bawah.',
            'greeting'   => 'Semoga mesej ini mendapati anda dalam keadaan baik.',
            'reason'     => 'Sebab:- :reason',
            'seller-msg' => 'Hai, ":name" telah melaporkan produk anda ":product_name". Sila semak butiran di bawah.',
            'subject'    => 'Notis Laporan Produk',
        ],

        'report-seller' => [
            'admin-msg'  => 'Hai, :name telah melaporkan isu berkaitan :seller_name. Sila semak butiran di bawah.',
            'greeting'   => 'Semoga mesej ini sampai kepada anda.',
            'reason'     => 'Sebab:- :reason',
            'seller-msg' => 'Hai, :name telah melaporkan isu berkaitan anda. Sila semak butiran di bawah.',
            'subject'    => 'Notis Laporan Penjual',
        ],
    ],

    'seeders' => [
        'configurations' => [
            'banner-title'        => 'Cipta Akaun Penjual Velocity',
            'banner-description'  => 'Velocity ialah platform yang hebat untuk menjual produk anda kepada perniagaan baharu di Malaysia. Dengan panduan berikut, anda boleh berjaya menjadi penjual di Velocity!',
            'banner-btn-title'    => 'Buka Kedai',
            'feature-title'       => 'Mengapa Penjual Suka Menjual di Velocity?',
            'feature-description' => 'Penjual suka platform yang cekap kerana ia memberikan lebih banyak peluang jualan, pendedahan lebih tinggi, dan pengalaman jualan yang boleh meningkatkan pertumbuhan serta kejayaan perniagaan.',
            'feature-box1-title'  => 'Tingkatkan Peluang Jualan',
            'feature-box1-desc'   => 'Platform cekap menyediakan potensi untuk meningkatkan jualan, pendedahan lebih tinggi, dan pengalaman jualan yang lebih baik.',
            'feature-box2-title'  => 'Putaran Stok Lebih Pantas',
            'feature-box2-desc'   => 'Di platform cekap, produk terjual lebih cepat, mempercepatkan putaran stok dan menjana pendapatan penjual.',
            'feature-box3-title'  => 'Keterlihatan Dipertingkat',
            'feature-box3-desc'   => 'Platform ini memberi produk penjual lebih keterlihatan dan pendedahan, menghasilkan lebih banyak tontonan dan potensi jualan.',
            'feature-box4-title'  => 'Kecekapan & Kemudahan',
            'feature-box4-desc'   => 'Platform cekap biasanya mempunyai proses dan alatan yang dipermudahkan, menjimatkan masa dan usaha penjual dalam menguruskan perniagaan dalam talian.',
            'journey-title'       => 'Mulakan Perjalanan Velocity Anda',
            'journey-description' => 'Jual kepada pelanggan besar di seluruh dunia 24/7.',
            'journey-step1-title' => 'Jadi Penjual',
            'journey-step1-desc'  => 'Tetapkan kedai anda termasuk semua maklumat asas.',
            'journey-step2-title' => 'Senaraikan Produk',
            'journey-step2-desc'  => 'Senaraikan produk di kedai supaya pelanggan boleh lihat dan beli.',
            'journey-step3-title' => 'Terima Pesanan',
            'journey-step3-desc'  => 'Terima pesanan daripada pelanggan di seluruh dunia.',
            'journey-step4-title' => 'Penghantaran Produk',
            'journey-step4-desc'  => 'Produk dihantar dan pembayaran diterima.',
            'journey-step5-title' => 'Pembayaran',
            'journey-step5-desc'  => 'Mohon pembayaran, terima amaun selepas ditolak komisen.',
        ],

        'flag-reasons' => [
            'damaged-product'           => 'Produk Rosak',
            'damaged-product-sold'      => 'Penjual menjual produk rosak',
            'duplicate-product'         => 'Produk Pendua',
            'duplicate-product-sold'    => 'Penjual menjual produk pendua',
            'missing-product-parts'     => 'Bahagian Produk Hilang',
            'over-price-product'        => 'Produk Terlalu Mahal',
            'over-price-product-sold'   => 'Penjual menjual produk terlalu mahal',
            'poor-product-quality'      => 'Kualiti Produk Rendah',
            'poor-product-quality-sold' => 'Penjual menjual produk berkualiti rendah',
            'receive-wrong-product'     => 'Terima Produk Salah',
            'wrong-product-sold'        => 'Penjual menjual produk salah',
        ],
    ],

    'components' => [
        'seller' => [
            'datagrid' => [
                'export' => [
                    'csv'        => 'CSV',
                    'download'   => 'Muat Turun',
                    'export'     => 'Eksport',
                    'no-records' => 'Tiada rekod untuk dieksport',
                    'xls'        => 'XLS',
                    'xlsx'       => 'XLSX',
                ],
            ],

            'layouts' => [
                'header' => [
                    'home-page'  => 'Laman Utama',
                    'logout'     => 'Log Keluar',
                    'my-profile' => 'Profil Saya',
                    'visit-shop' => 'Lawati Kedai',

                    'mega-search' => [
                        'customers'                       => 'Pelanggan',
                        'explore-all-customers'           => 'Lihat semua pelanggan',
                        'explore-all-matching-customers'  => 'Lihat semua pelanggan yang sepadan dengan “:query” (:count)',
                        'explore-all-matching-orders'     => 'Lihat semua pesanan yang sepadan dengan “:query” (:count)',
                        'explore-all-matching-products'   => 'Lihat semua produk yang sepadan dengan “:query” (:count)',
                        'explore-all-orders'              => 'Lihat semua pesanan',
                        'explore-all-products'            => 'Lihat semua produk',
                        'orders'                          => 'Pesanan',
                        'products'                        => 'Produk',
                        'sku'                             => 'SKU: :sku',
                        'title'                           => 'Carian Pantas',
                    ],
                ],

                'sidebar' => [
                    'collapse' => 'Kuncupkan',
                ],
            ],

            'media' => [
                'images' => [
                    'add-image-btn'     => 'Tambah Imej',
                    'allowed-types'     => 'png, jpeg, jpg',
                    'not-allowed-error' => 'Hanya fail imej dibenarkan (.jpeg, .jpg, .png ..).',
                ],

                'videos' => [
                    'add-video-btn'     => 'Tambah Video',
                    'allowed-types'     => 'mp4, webm, mkv',
                    'not-allowed-error' => 'Hanya fail video dibenarkan (.mp4, .mov, .ogg ..).',
                ],

                'documents' => [
                    'add-document-btn'  => 'Tambah Dokumen',
                    'allowed-types'     => ':types',
                    'not-allowed-error' => 'Hanya fail dokumen dibenarkan (:types ..).',
                ],

                'placeholders' => [
                    'csv'        => 'CSV',
                    'excel'      => 'Excel',
                    'front'      => 'Depan',
                    'next'       => 'Seterusnya',
                    'pdf'        => 'PDF',
                    'powerpoint' => 'PPT',
                    'size'       => 'Saiz',
                    'text'       => 'Teks',
                    'use-cases'  => 'Kes Penggunaan',
                    'word'       => 'Word',
                    'zoom'       => 'Zum',
                ],
            ],
        ],
    ],

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

        'acl' => [
            'assign'            => 'Tetapkan',
            'bookings'          => 'Tempahan',
            'cancel'            => 'Batal',
            'communication'     => 'Komunikasi',
            'create'            => 'Cipta',
            'customers'         => 'Pelanggan',
            'dashboard'         => 'Papan Pemuka',
            'delete'            => 'Padam',
            'edit'              => 'Sunting',
            'extensions'        => 'Sambungan',
            'general'           => 'Umum',
            'inventory-sources' => 'Sumber Inventori',
            'invoice'           => 'Invois',
            'orders'            => 'Pesanan',
            'payment-request'   => 'Permintaan Bayaran',
            'print'             => 'Cetak',
            'print-invoice'     => 'Cetak Invois',
            'product-reviews'   => 'Ulasan Produk',
            'products'          => 'Produk',
            'reporting'         => 'Laporan',
            'sales'             => 'Jualan',
            'seller-reviews'    => 'Ulasan Penjual',
            'settings'          => 'Tetapan',
            'shipment'          => 'Penghantaran',
            'transactions'      => 'Transaksi',
            'view'              => 'Lihat',
        ],

        'breadcrumb' => [
            'add-new-product'   => 'Tambah Produk Baharu',
            'assign'            => 'Tetapkan',
            'bookings'          => 'Tempahan',
            'communication'     => 'Komunikasi',
            'create'            => 'Cipta',
            'customers'         => 'Pelanggan',
            'dashboard'         => 'Papan Pemuka',
            'edit'              => 'Sunting',
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
            'title'             => 'Profil',
            'transaction'       => 'Transaksi',
            'users'             => 'Pengguna',
            'view'              => 'Lihat',
        ],

        'login' => [
            'bagisto'             => 'Bagisto',
            'button-title'        => 'Log Masuk',
            'create-your-account' => 'Cipta Akaun Anda',
            'email'               => 'E-mel',
            'footer'              => '© Hakcipta 2025 - :current_year, TRI TETRA SDN BHD  202501012341 (1613755-U). Semua hak terpelihara.',
            'forgot-pass'         => 'Lupa Kata Laluan?',
            'form-login-text'     => 'Jika anda mempunyai akaun, sila log masuk menggunakan alamat e-mel anda.',
            'invalid-credentials' => 'Sila semak maklumat anda dan cuba lagi.',
            'new-seller'          => 'Penjual Baharu?',
            'not-approved'        => 'Akaun anda menunggu kelulusan pentadbir',
            'page-title'          => 'Log Masuk Penjual',
            'password'            => 'Kata Laluan',
            'show-password'       => 'Tunjuk Kata Laluan',
            'suspended-message'   => 'Akaun anda telah digantung. Sila hubungi pentadbir untuk maklumat lanjut.',
            'title'               => 'Log Masuk',
        ],
    ],

    'shop' => [
        'layout' => [
            'header' => [
                'seller-logo'     => 'Logo Penjual',
                'switch-to-store' => 'Tukar ke Kedai Urusan',
            ],
        ],

        'checkout' => [
            'cart' => [
                'minimum-order-message' => 'Jumlah pesanan minimum untuk :shop_title ialah',
                'product-not-available' => 'Produk tidak tersedia',
                'sold-by'               => 'Dijual oleh',
            ],
        ],

        'marketplace' => [
            'index' => [
                'days-payment'        => 'Hari *Bayaran',
                'deals-in'            => 'Berdagang dalam',
                'featured-seller'     => 'Penjual Pilihan Kami',
                'online-business'     => 'Perniagaan Atas Talian',
                'reviews'             => ':count Ulasan:',
                'seller-community'    => 'Komuniti Penjual',
                'serviceable-pincode' => 'Poskod Perkhidmatan',
                'start-selling'       => 'Mula menjual 24/7 bersama pelanggan besar di seluruh dunia.',
                'step'                => 'Langkah :count',
                'visit-shop'          => 'Lawati Kedai',
            ],
        ],

        'products' => [
            'add-to-cart'   => 'Tambah ke Troli',
            'delivery-info' => 'Maklumat penghantaran dipaparkan di sini',
            'hide'          => 'Sembunyikan',
            'more-info'     => 'Maklumat Lanjut',
            'seller-count'  => ':count penjual menjual produk yang sama',
            'seller-info'   => 'Maklumat Penjual',
            'sold-by'       => 'Dijual oleh',
            'top-selling'   => 'Produk Terlaris',

            'flag' => [
                'alert'              => 'Amaran',
                'already-reported'   => 'Anda sudah melaporkan produk ini',
                'create-success'     => 'Laporan produk berjaya dihantar',
                'guest-alert'        => 'Anda perlu log masuk untuk melaporkan produk ini',
                'not-allowed'        => 'Tanpa pesanan, tidak boleh laporkan produk ini',
                'other-reason'       => 'Sebab lain',
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
                    'title'           => 'Tentang Kami',
                    'about-us'        => 'Tentang Kami',
                    'shipping-policy' => 'Polisi Penghantaran',
                    'privacy-policy'  => 'Polisi Privasi',
                    'return-policy'   => 'Polisi Pemulangan',
                ],

                'contact-form' => [
                    'title'          => 'Hubungi Kami',
                    'name'           => 'Nama',
                    'email'          => 'E-mel',
                    'subject'        => 'Subjek',
                    'query'          => 'Pertanyaan',
                    'submit-btn'     => 'Hantar',
                    'create-success' => 'Pertanyaan anda berjaya dihantar',
                ],

                'share' => [
                    'title'     => 'Kongsi',
                    'share-on'  => 'Kongsi ke',
                    'facebook'  => 'Facebook',
                    'linkedin'  => 'LinkedIn',
                    'twitter'   => 'Twitter',
                    'pinterest' => 'Pinterest',
                ],

                'report-form' => [
                    'alert'              => 'Amaran',
                    'already-reported'   => 'Anda sudah melaporkan penjual ini',
                    'create-success'     => 'Laporan penjual berjaya dihantar',
                    'guest-alert'        => 'Anda perlu log masuk untuk melaporkan penjual',
                    'not-allowed'        => 'Tanpa pesanan, tidak boleh laporkan penjual ini',
                    'other-reason'       => 'Sebab lain',
                    'reason'             => 'Sebab',
                    'reason-placeholder' => 'Sila nyatakan sebab',
                    'select-reason'      => 'Pilih Sebab',
                    'submit-btn'         => 'Hantar',
                    'title'              => 'Laporkan Isu',
                ],

                'reviews' => [
                    'alert'            => 'Amaran',
                    'already-reviewed' => 'Anda sudah memberi ulasan kepada penjual ini',
                    'comment'          => 'Komen',
                    'create-success'   => 'Ulasan penjual berjaya dihantar',
                    'customer-review'  => ':count Ulasan Pelanggan',
                    'customer-reviews' => 'Ulasan Pelanggan',
                    'guest-alert'      => 'Anda perlu log masuk untuk menilai penjual',
                    'rating'           => 'Penilaian',
                    'review-by'        => 'Ditulis oleh',
                    'submit-btn'       => 'Hantar',
                    'title'            => 'Tajuk',
                    'view-all'         => 'Lihat Semua Ulasan',
                    'write-review'     => 'Tulis Ulasan',
                ],

                'products' => [
                    'no-result' => 'Tiada produk ditemui',
                    'show'      => 'Papar',

                    'sort-by' => [
                        'title' => 'Susun Ikut',

                        'options' => [
                            'cheapest-first'  => 'Harga Rendah ke Tinggi',
                            'expensive-first' => 'Harga Tinggi ke Rendah',
                            'from-a-z'        => 'Dari A ke Z',
                            'from-z-a'        => 'Dari Z ke A',
                            'latest-first'    => 'Terkini Dahulu',
                            'oldest-first'    => 'Terdahulu Dahulu',
                        ],
                    ],

                    'filters' => [
                        'clear-all'   => 'Kosongkan Semua',
                        'filter'      => 'Tapis',
                        'filters'     => 'Penapis:',
                        'price-range' => 'Julat Harga',
                        'sort'        => 'Susun',
                    ],
                ],
            ],
        ],
    ],
];
