<?php

return [
    'seeders' => [
        'attribute' => [
            'attribute-families' => [
                'default' => 'Lalai',
            ],

            'attribute-groups' => [
                'description'      => 'Penerangan',
                'general'          => 'Umum',
                'inventories'      => 'Inventori',
                'meta-description' => 'Meta Penerangan',
                'price'            => 'Harga',
                'settings'         => 'Tetapan',
                'shipping'         => 'Penghantaran',
            ],

            'attributes' => [
                'brand'                => 'Jenama',
                'color'                => 'Warna',
                'cost'                 => 'Kos',
                'description'          => 'Penerangan',
                'featured'             => 'Ditampilkan',
                'guest-checkout'       => 'Checkout Tetamu',
                'height'               => 'Tinggi',
                'length'               => 'Panjang',
                'manage-stock'         => 'Urus Stok',
                'meta-description'     => 'Meta Penerangan',
                'meta-keywords'        => 'Meta Kata Kunci',
                'meta-title'           => 'Meta Tajuk',
                'name'                 => 'Nama',
                'new'                  => 'Baru',
                'price'                => 'Harga',
                'product-number'       => 'Nombor Produk',
                'short-description'    => 'Penerangan Ringkas',
                'size'                 => 'Saiz',
                'sku'                  => 'SKU',
                'special-price'        => 'Harga Istimewa',
                'special-price-from'   => 'Tarikh Mula Harga Istimewa',
                'special-price-to'     => 'Tarikh Tamat Harga Istimewa',
                'status'               => 'Status',
                'tax-category'         => 'Kategori Cukai',
                'url-key'              => 'Kunci URL',
                'visible-individually' => 'Kelihatan Secara Individu',
                'weight'               => 'Berat',
                'width'                => 'Lebar',
            ],

            'attribute-options' => [
                'black'  => 'Hitam',
                'green'  => 'Hijau',
                'l'      => 'L',
                'm'      => 'M',
                'red'    => 'Merah',
                's'      => 'S',
                'white'  => 'Putih',
                'xl'     => 'XL',
                'yellow' => 'Kuning',
            ],
        ],

        'category' => [
            'categories' => [
                'description' => 'Penerangan Kategori Akar',
                'name'        => 'Akar',
            ],
        ],

        'cms' => [
            'pages' => [
                'about-us' => [
                    'content' => 'Kandungan halaman Tentang Kami',
                    'title'   => 'Tentang Kami',
                ],

                'contact-us' => [
                    'content' => 'Kandungan halaman Hubungi Kami',
                    'title'   => 'Hubungi Kami',
                ],

                'customer-service' => [
                    'content' => 'Kandungan halaman Khidmat Pelanggan',
                    'title'   => 'Khidmat Pelanggan',
                ],

                'payment-policy' => [
                    'content' => 'Kandungan halaman Polisi Pembayaran',
                    'title'   => 'Polisi Pembayaran',
                ],

                'privacy-policy' => [
                    'content' => 'Kandungan halaman Polisi Privasi',
                    'title'   => 'Polisi Privasi',
                ],

                'refund-policy' => [
                    'content' => 'Kandungan halaman Polisi Bayaran Balik',
                    'title'   => 'Polisi Bayaran Balik',
                ],

                'return-policy' => [
                    'content' => 'Kandungan halaman Polisi Pemulangan',
                    'title'   => 'Polisi Pemulangan',
                ],

                'shipping-policy' => [
                    'content' => 'Kandungan halaman Polisi Penghantaran',
                    'title'   => 'Polisi Penghantaran',
                ],

                'terms-conditions' => [
                    'content' => 'Kandungan halaman Terma & Syarat',
                    'title'   => 'Terma & Syarat',
                ],

                'terms-of-use' => [
                    'content' => 'Kandungan halaman Terma Penggunaan',
                    'title'   => 'Terma Penggunaan',
                ],

                'whats-new' => [
                    'content' => 'Kandungan halaman Apa Yang Baru',
                    'title'   => 'Apa Yang Baru',
                ],
            ],
        ],

        'core' => [
            'channels' => [
                'name'             => 'Lalai',
                'meta-title'       => 'Kedai Demo',
                'meta-keywords'    => 'Kata Kunci Meta Kedai Demo',
                'meta-description' => 'Penerangan Meta Kedai Demo',
            ],

            'currencies' => [
                'MYR' => 'Ringgit Malaysia',
                'USD' => 'Dolar Amerika',
                'SGD' => 'Dolar Singapura',
                'EUR' => 'Euro',
                'JPY' => 'Yen Jepun',
                'CNY' => 'Yuan Renminbi',
                'GBP' => 'Pound Sterling',
                // … (boleh biar nama mata wang lain dalam BM penuh kalau nak)
            ],

            'locales' => [
                'en'    => 'Bahasa Inggeris',
                'ms'    => 'Bahasa Melayu',
                'zh_CN' => 'Bahasa Cina Ringkas',
                'ar'    => 'Bahasa Arab',
                'fr'    => 'Bahasa Perancis',
                'de'    => 'Bahasa Jerman',
                'es'    => 'Bahasa Sepanyol',
                'id'    => 'Bahasa Indonesia',
                'ja'    => 'Bahasa Jepun',
                'ru'    => 'Bahasa Rusia',
                // dan seterusnya…
            ],
        ],

        'customer' => [
            'customer-groups' => [
                'general'   => 'Umum',
                'guest'     => 'Tetamu',
                'wholesale' => 'Boron',
            ],
        ],

        'inventory' => [
            'inventory-sources' => [
                'name' => 'Lalai',
            ],
        ],

        'user' => [
            'roles' => [
                'description' => 'Pengguna peranan ini akan mempunyai semua akses',
                'name'        => 'Pentadbir',
            ],

            'users' => [
                'name' => 'Contoh',
            ],
        ],
    ],

    'installer' => [
        'index' => [
            'create-administrator' => [
                'admin'            => 'Pentadbir',
                'bagisto'          => 'Bagisto',
                'confirm-password' => 'Sahkan Kata Laluan',
                'email'            => 'E-mel',
                'email-address'    => 'admin@example.com',
                'password'         => 'Kata Laluan',
                'title'            => 'Cipta Pentadbir',
            ],

            'environment-configuration' => [
                'algerian-dinar'              => 'Dinar Algeria (DZD)',
                'allowed-currencies'          => 'Mata Wang Dibenarkan',
                'allowed-locales'             => 'Lokaliti Dibenarkan',
                'application-name'            => 'Nama Aplikasi',
                'argentine-peso'              => 'Peso Argentina (ARS)',
                'australian-dollar'           => 'Dolar Australia (AUD)',
                'bagisto'                     => 'Bagisto',
                'bangladeshi-taka'            => 'Taka Bangladesh (BDT)',
                'bahraini-dinar'              => 'Dinar Bahrain (BHD)',
                'brazilian-real'              => 'Real Brazil (BRL)',
                'british-pound-sterling'      => 'Pound Sterling (GBP)',
                'canadian-dollar'             => 'Dolar Kanada (CAD)',
                'cfa-franc-bceao'             => 'Franc CFA BCEAO (XOF)',
                'cfa-franc-beac'              => 'Franc CFA BEAC (XAF)',
                'chilean-peso'                => 'Peso Chile (CLP)',
                'chinese-yuan'                => 'Yuan Renminbi (CNY)',
                'colombian-peso'              => 'Peso Colombia (COP)',
                'czech-koruna'                => 'Koruna Czech (CZK)',
                'danish-krone'                => 'Krone Denmark (DKK)',
                'database-connection'         => 'Sambungan Pangkalan Data',
                'database-hostname'           => 'Nama Hos Pangkalan Data',
                'database-name'               => 'Nama Pangkalan Data',
                'database-password'           => 'Kata Laluan Pangkalan Data',
                'database-port'               => 'Port Pangkalan Data',
                'database-prefix'             => 'Awalan Pangkalan Data',
                'database-username'           => 'Nama Pengguna Pangkalan Data',
                'default-currency'            => 'Mata Wang Lalai',
                'default-locale'              => 'Lokaliti Lalai',
                'default-timezone'            => 'Zon Waktu Lalai',
                'default-url'                 => 'URL Lalai',
                'default-url-link'            => 'https://localhost',
                'egyptian-pound'              => 'Paun Mesir (EGP)',
                'euro'                        => 'Euro (EUR)',
                'fijian-dollar'               => 'Dolar Fiji (FJD)',
                'hong-kong-dollar'            => 'Dolar Hong Kong (HKD)',
                'hungarian-forint'            => 'Forint Hungary (HUF)',
                'indian-rupee'                => 'Rupee India (INR)',
                'indonesian-rupiah'           => 'Rupiah Indonesia (IDR)',
                'israeli-new-shekel'          => 'Shekel Baharu Israel (ILS)',
                'japanese-yen'                => 'Yen Jepun (JPY)',
                'jordanian-dinar'             => 'Dinar Jordan (JOD)',
                'kazakhstani-tenge'           => 'Tenge Kazakhstan (KZT)',
                'kuwaiti-dinar'               => 'Dinar Kuwait (KWD)',
                'lebanese-pound'              => 'Paun Lubnan (LBP)',
                'libyan-dinar'                => 'Dinar Libya (LYD)',
                'malaysian-ringgit'           => 'Ringgit Malaysia (MYR)',
                'mauritian-rupee'             => 'Rupee Mauritius (MUR)',
                'mexican-peso'                => 'Peso Mexico (MXN)',
                'moroccan-dirham'             => 'Dirham Maghribi (MAD)',
                'mysql'                       => 'MySQL',
                'nepalese-rupee'              => 'Rupee Nepal (NPR)',
                'new-taiwan-dollar'           => 'Dolar Taiwan Baharu (TWD)',
                'new-zealand-dollar'          => 'Dolar New Zealand (NZD)',
                'nigerian-naira'              => 'Naira Nigeria (NGN)',
                'norwegian-krone'             => 'Krone Norway (NOK)',
                'omani-rial'                  => 'Rial Oman (OMR)',
                'pakistani-rupee'             => 'Rupee Pakistan (PKR)',
                'panamanian-balboa'           => 'Balboa Panama (PAB)',
                'paraguayan-guarani'          => 'Guarani Paraguay (PYG)',
                'peruvian-nuevo-sol'          => 'Nuevo Sol Peru (PEN)',
                'pgsql'                       => 'PgSQL',
                'philippine-peso'             => 'Peso Filipina (PHP)',
                'polish-zloty'                => 'Zloty Poland (PLN)',
                'qatari-rial'                 => 'Riyal Qatar (QAR)',
                'romanian-leu'                => 'Leu Romania (RON)',
                'russian-ruble'               => 'Rubel Rusia (RUB)',
                'saudi-riyal'                 => 'Riyal Saudi (SAR)',
                'select-timezone'             => 'Pilih Zon Waktu',
                'singapore-dollar'            => 'Dolar Singapura (SGD)',
                'south-african-rand'          => 'Rand Afrika Selatan (ZAR)',
                'south-korean-won'            => 'Won Korea Selatan (KRW)',
                'sqlsrv'                      => 'SQLSRV',
                'sri-lankan-rupee'            => 'Rupee Sri Lanka (LKR)',
                'swedish-krona'               => 'Krona Sweden (SEK)',
                'swiss-franc'                 => 'Franc Swiss (CHF)',
                'thai-baht'                   => 'Baht Thai (THB)',
                'title'                       => 'Konfigurasi Kedai',
                'tunisian-dinar'              => 'Dinar Tunisia (TND)',
                'turkish-lira'                => 'Lira Turki (TRY)',
                'ukrainian-hryvnia'           => 'Hryvnia Ukraine (UAH)',
                'united-arab-emirates-dirham' => 'Dirham UAE (AED)',
                'united-states-dollar'        => 'Dolar Amerika (USD)',
                'uzbekistani-som'             => 'Som Uzbekistan (UZS)',
                'venezuelan-bolívar'          => 'Bolívar Venezuela (VEF)',
                'vietnamese-dong'             => 'Dong Vietnam (VND)',
                'warning-message'             => 'Perhatian! Tetapan Bahasa Lalai dan Mata Wang Lalai adalah kekal dan tidak boleh diubah selepas disimpan.',
                'zambian-kwacha'              => 'Kwacha Zambia (ZMW)',
            ],

            'sample-products' => [
                'download-sample' => 'Muat Turun Sampel',
                'no'              => 'Tidak',
                'sample-products' => 'Produk Sampel',
                'title'           => 'Produk Sampel',
                'yes'             => 'Ya',
            ],

            'installation-processing' => [
                'bagisto-info' => 'Sedang membuat jadual pangkalan data, ini mungkin mengambil sedikit masa',
                'bagisto'      => 'Pemasangan Bagisto',
                'title'        => 'Pemasangan',
            ],

            'installation-completed' => [
                'admin-panel'                => 'Panel Pentadbir',
                'bagisto-forums'             => 'Forum Bagisto',
                'customer-panel'             => 'Panel Pelanggan',
                'explore-bagisto-extensions' => 'Terokai Sambungan Bagisto',
                'title'                      => 'Pemasangan Selesai',
                'title-info'                 => 'Bagisto berjaya dipasang pada sistem anda.',
            ],

            'ready-for-installation' => [
                'create-databsae-table'   => 'Cipta Jadual Pangkalan Data',
                'install'                 => 'Pasang',
                'install-info'            => 'Maklumat Pemasangan Bagisto',
                'install-info-button'     => 'Klik butang di bawah',
                'populate-database-table' => 'Isi Jadual Pangkalan Data',
                'start-installation'      => 'Mula Pemasangan',
                'title'                   => 'Sedia untuk Pemasangan',
            ],

            'start' => [
                'locale'        => 'Lokaliti',
                'main'          => 'Mula',
                'select-locale' => 'Pilih Lokaliti',
                'title'         => 'Pemasangan Bagisto Anda',
                'welcome-title' => 'Selamat Datang ke Bagisto',
            ],

            'server-requirements' => [
                'calendar'    => 'Kalendar',
                'ctype'       => 'cType',
                'curl'        => 'cURL',
                'dom'         => 'DOM',
                'fileinfo'    => 'Maklumat Fail',
                'filter'      => 'Penapis',
                'gd'          => 'GD',
                'hash'        => 'Hash',
                'intl'        => 'Internationalisasi',
                'json'        => 'JSON',
                'mbstring'    => 'Mbstring',
                'openssl'     => 'OpenSSL',
                'pcre'        => 'PCRE',
                'pdo'         => 'PDO',
                'php'         => 'PHP',
                'php-version' => '8.1 atau lebih tinggi',
                'session'     => 'Sesi',
                'title'       => 'Keperluan Pelayan',
                'tokenizer'   => 'Tokenizer',
                'xml'         => 'XML',
            ],

            'arabic'                   => 'Bahasa Arab',
            'back'                     => 'Kembali',
            'bagisto'                  => 'Bagisto',
            'bagisto-info'             => 'Projek dibangunkan bersama oleh Komuniti Webkul',
            'bagisto-logo'             => 'Logo Bagisto',
            'bengali'                  => 'Bahasa Bengali',
            'chinese'                  => 'Bahasa Cina',
            'continue'                 => 'Teruskan',
            'dutch'                    => 'Bahasa Belanda',
            'english'                  => 'Bahasa Inggeris',
            'french'                   => 'Bahasa Perancis',
            'german'                   => 'Bahasa Jerman',
            'hebrew'                   => 'Bahasa Ibrani',
            'hindi'                    => 'Bahasa Hindi',
            'installation-description' => 'Pemasangan Bagisto biasanya melibatkan beberapa langkah. Berikut adalah gambaran umum proses pemasangan Bagisto.',
            'installation-info'        => 'Kami gembira bertemu anda di sini!',
            'installation-title'       => 'Selamat Datang ke Pemasangan Bagisto',
            'italian'                  => 'Bahasa Itali',
            'japanese'                 => 'Bahasa Jepun',
            'persian'                  => 'Bahasa Parsi',
            'polish'                   => 'Bahasa Poland',
            'portuguese'               => 'Bahasa Portugis (Brazil)',
            'russian'                  => 'Bahasa Rusia',
            'sinhala'                  => 'Bahasa Sinhala',
            'spanish'                  => 'Bahasa Sepanyol',
            'title'                    => 'Pemasang Bagisto',
            'turkish'                  => 'Bahasa Turki',
            'ukrainian'                => 'Bahasa Ukraine',
            'webkul'                   => 'Webkul',
        ],
    ],
];
