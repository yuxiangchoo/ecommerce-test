<?php

return [
     'admin' => [
        'data-transfer' => [
            'index' => [
                'title' => 'Pazar İthalatları'
            ],
            'imports' => [
                'index' => [
                    'button-title' => 'İthalat Oluştur',
                    'back-btn'     => 'Geri'
                ],
                'products' => [
                    'title' => 'Satıcı Ürünleri'
                ],
                'categories' => [
                    'title' => 'Kategoriler'
                ],
                'seller' => [
                    'categories' => [
                        'title' => 'Satıcı Kategorileri'
                    ],
                ],
                'create' => [
                    'marketplace'   => 'Pazar',
                    'set_seller'    => 'Satıcı Ayarla',
                    'select_seller' => 'Satıcı Seç',
                    'upload_images' => 'Görüntü Yükle (Zip)',
                ]
            ]
        ],
        'menu' => [
            'data-transfer' => 'Veri Aktarımı'
        ]
    ],
    'shop' => [
        'sellers' => [
            'account' => [
                'menu' => [
                    'seller-data-transfer' => 'Veri Aktarımı'
                ],
                'seller-data-transfer' => [
                    'index' => [
                        'title' => 'Veri Aktarımı',
                        'imports' => [
                            'index' => [
                                'button-title'      => 'İthalat Oluştur',
                                'save-button-title' => 'İthalatı Kaydet',
                                'title'             => 'İthalatlar',
                                'back-btn'          => 'Geri',
                                'datagrid' => [
                                    'import'        => 'İthalat',
                                    'edit'          => 'Düzenle',
                                    'delete'        => 'Sil',
                                    'actions'       => 'İşlemler',
                                    'completed-at'  => 'Tamamlandı',
                                    'created'       => 'Oluşturuldu',
                                    'delete'        => 'Sil',
                                    'deleted'       => 'Silindi',
                                    'edit'          => 'Düzenle',
                                    'error-file'    => 'Hata Dosyası',
                                    'id'            => 'ID',
                                    'seller'        => 'Satıcı',
                                    'started-at'    => 'Başlatıldı',
                                    'state'         => 'Durum',
                                    'summary'       => 'Özet',
                                    'updated'       => 'Güncellendi',
                                    'uploaded-file' => 'Yüklenen Dosya',
                                ],
                            ],
                            'create' => [
                                'action'              => 'Eylem',
                                'allowed-errors'      => 'İzin Verilen Hatalar',
                                'back-btn'            => 'Geri',
                                'create-update'       => 'Oluştur/Düzenle',
                                'delete'              => 'Sil',
                                'download-sample'     => 'Örnek İndir',
                                'download-sample-zip' => 'Örnek Görselleri Zip Olarak İndir',
                                'field-separator'     => 'Alan Ayrıcı',
                                'file-info-example'   => 'Örneğin, ürün görselleri için dosyalar /project-root/storage/app/import/product-images klasörüne yerleştirilmelidir.',
                                'file-info'           => 'İlişkili yolu kullanın, örneğin product-images, import-images.',
                                'file'                => 'Dosya',
                                'general'             => 'Genel',
                                'images-directory'    => 'Görüntü Dizini Yolu',
                                'process-in-queue'    => 'Sırada İşlem',
                                'results'             => 'Sonuçlar',
                                'save-btn'            => 'İthalatı Kaydet',
                                'settings'            => 'Ayarlar',
                                'skip-errors'         => 'Hataları Atla',
                                'stop-on-errors'      => 'Hatalarda Durdur',
                                'title'               => 'İthalat Oluştur',
                                'type'                => 'Tür',
                                'validation-strategy' => 'Doğrulama Stratejisi',
                                'upload_images'       => 'Görüntü Yükle (Zip)',
                            ],
                            'edit' => [
                                'action'              => 'Eylem',
                                'allowed-errors'      => 'İzin Verilen Hatalar',
                                'back-btn'            => 'Geri',
                                'create-update'       => 'Oluştur/Düzenle',
                                'delete'              => 'Sil',
                                'download-sample'     => 'Örnek İndir',
                                'download-sample-zip' => 'Örnek Görselleri Zip Olarak İndir',
                                'field-separator'     => 'Alan Ayrıcı',
                                'file-info-example'   => 'Örneğin, ürün görselleri için dosyalar /project-root/storage/app/import/product-images klasörüne yerleştirilmelidir.',
                                'file-info'           => 'İlişkili yolu kullanın, örneğin product-images, import-images.',
                                'file'                => 'Dosya',
                                'general'             => 'Genel',
                                'images-directory'    => 'Görüntü Dizini Yolu',
                                'process-in-queue'    => 'Sırada İşlem',
                                'results'             => 'Sonuçlar',
                                'save-btn'            => 'İthalatı Kaydet',
                                'settings'            => 'Ayarlar',
                                'skip-errors'         => 'Hataları Atla',
                                'stop-on-errors'      => 'Hatalarda Durdur',
                                'title'               => 'İthalatı Düzenle',
                                'type'                => 'Tür',
                                'validation-strategy' => 'Doğrulama Stratejisi',
                            ],
                            'import' => [
                                'back-btn'                => 'Geri',
                                'completed-batches'       => 'Tamamlanan Toplam Partiler:',
                                'download-error-report'   => 'Tam Raporu İndir',
                                'edit-btn'                => 'Düzenle',
                                'imported-info'           => 'Tebrikler! İthalatınız başarılı oldu.',
                                'importing-info'          => 'İthalat İşlemde',
                                'indexing-info'           => 'Kaynakların İndekslenmesi (Fiyat, Envanter ve Elastik Arama) Devam Ediyor',
                                'linking-info'            => 'Kaynakların Bağlanması Devam Ediyor',
                                'progress'                => 'İlerleme:',
                                'title'                   => 'İthalat',
                                'total-batches'           => 'Toplam Partiler:',
                                'total-created'           => 'Oluşturulan Toplam Kayıtlar:',
                                'total-deleted'           => 'Silinen Toplam Kayıtlar:',
                                'total-errors'            => 'Toplam Hatalar:',
                                'total-invalid-rows'      => 'Toplam Geçersiz Satırlar:',
                                'total-rows-processed'    => 'İşlenen Toplam Satırlar:',
                                'total-updated'           => 'Güncellenen Toplam Kayıtlar:',
                                'validate-info'           => 'İthalatınızı kontrol etmek için "Verileri Doğrula"ya tıklayın.',
                                'validate'                => 'Doğrula',
                                'validating-info'         => 'Veri Okuma ve Doğrulama Başladı',
                                'validation-failed-info'  => 'İthalatınız geçersiz. Lütfen aşağıdaki hataları düzeltin ve tekrar deneyin.',
                                'validation-success-info' => 'İthalatınız geçerli. İthalat işlemini başlatmak için "İthalat" düğmesine tıklayın.',
                            ],
                            'create-success'    => 'İthalat başarıyla oluşturuldu.',
                            'delete-failed'     => 'İthalat silme işlemi beklenmedik şekilde başarısız oldu.',
                            'delete-success'    => 'İthalat başarıyla silindi.',
                            'not-valid'         => 'İthalat geçersiz',
                            'nothing-to-import' => 'İthalat yapılacak kaynak yok.',
                            'setup-queue-error' => 'İthalat işlemini başlatmak için kuyruk sürücünüzü "veritabanı" veya "redis" olarak değiştirin.',
                            'update-success'    => 'İthalat başarıyla güncellendi.',
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
                    'not-found'              => 'Satıcı bulunamadı.',
                    'profile-fields-missing' => 'Satıcı profili alanları eksik: "%s".',
                ],
            ],
        ],
        'categories' => [
            'validation' => [
                'errors' => [
                    'duplicate-slug'           => 'Kategori Kısaltması: \'%s\' ithalat dosyasında birden fazla kez bulundu.',
                    'slug_not_found_to_delete' => 'Kategori Kısaltması: \'%s\' sistemde bulunamadı.',
                    'invalid_display_mode'     => 'Görüntüleme Modu: \'%s\' geçersiz, bu ürünler ve açıklamalar , yalnızca ürünler, yalnızca açıklama seçeneklerinden biri olmalıdır: products_and_description, products_only, description_only.',
                ],
            ],
        ],
    ],
];
