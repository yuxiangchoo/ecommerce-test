<?php

return [
    'admin' => [
        'data-transfer' => [
            'index' => [
                'title' => 'واردات بازار'
            ],
            'imports' => [
                'index' => [
                    'button-title' => 'ایجاد واردات',
                    'back-btn'     => 'بازگشت'
                ],
                'products' => [
                    'title' => 'محصولات فروشنده'
                ],
                'categories' => [
                    'title' => 'دسته‌بندی‌ها'
                ],
                'seller' => [
                    'categories' => [
                        'title' => 'دسته‌بندی‌های فروشنده'
                    ],
                ],
                'create' => [
                    'marketplace'   => 'بازار',
                    'set_seller'    => 'انتخاب فروشنده',
                    'select_seller' => 'انتخاب فروشنده',
                    'upload_images' => 'آپلود تصاویر (فایل Zip)',
                ]
            ]
        ],
        'menu' => [
            'data-transfer' => 'انتقال داده‌ها'
        ]
    ],
    'shop' => [
        'sellers' => [
            'account' => [
                'menu' => [
                    'seller-data-transfer' => 'انتقال داده‌ها'
                ],
                'seller-data-transfer' => [
                    'index' => [
                        'title' => 'انتقال داده‌ها'
                    ],
                    'imports' => [
                        'index' => [
                            'button-title'      => 'ایجاد واردات',
                            'save-button-title' => 'ذخیره واردات',
                            'title'             => 'واردات',
                            'back-btn'          => 'بازگشت',
                            'datagrid' => [
                                'import'        => 'واردات',
                                'edit'          => 'ویرایش',
                                'delete'        => 'حذف',
                                'actions'       => 'عملیات',
                                'completed-at'  => 'تکمیل شده در',
                                'created'       => 'ایجاد شده',
                                'deleted'       => 'حذف شده',
                                'edit'          => 'ویرایش',
                                'error-file'    => 'فایل خطا',
                                'id'            => 'شناسه',
                                'seller'        => 'فروشنده',
                                'started-at'    => 'شروع شده در',
                                'state'         => 'وضعیت',
                                'summary'       => 'خلاصه',
                                'updated'       => 'بروزرسانی شده',
                                'uploaded-file' => 'فایل آپلود شده',
                            ],
                        ],
                        'create' => [
                            'action'              => 'عملیات',
                            'allowed-errors'      => 'خطاهای مجاز',
                            'back-btn'            => 'بازگشت',
                            'create-update'       => 'ایجاد/بروزرسانی',
                            'delete'              => 'حذف',
                            'download-sample'     => 'دانلود نمونه',
                            'download-sample-zip' => 'دانلود فایل Zip نمونه تصاویر',
                            'field-separator'     => 'جداکننده فیلد',
                            'file-info-example'   => 'به عنوان مثال، در مورد تصاویر محصولات، فایل‌ها باید در مسیر /project-root/storage/app/import/product-images قرار گیرند.',
                            'file-info'           => 'از مسیر نسبی به /project-root/storage/app/import استفاده کنید، مثل product-images، import-images.',
                            'file'                => 'فایل',
                            'general'             => 'عمومی',
                            'images-directory'    => 'مسیر دایرکتوری تصاویر',
                            'process-in-queue'    => 'پردازش در صف',
                            'results'             => 'نتایج',
                            'save-btn'            => 'ذخیره واردات',
                            'settings'            => 'تنظیمات',
                            'skip-errors'         => 'رد کردن خطاها',
                            'stop-on-errors'      => 'توقف در خطاها',
                            'title'               => 'ایجاد واردات',
                            'type'                => 'نوع',
                            'validation-strategy' => 'استراتژی اعتبارسنجی',
                            'upload_images'       => 'آپلود تصاویر (فایل Zip)',
                        ],
                        'edit' => [
                            'action'              => 'عملیات',
                            'allowed-errors'      => 'خطاهای مجاز',
                            'back-btn'            => 'بازگشت',
                            'create-update'       => 'ایجاد/بروزرسانی',
                            'delete'              => 'حذف',
                            'download-sample'     => 'دانلود نمونه',
                            'download-sample-zip' => 'دانلود فایل Zip نمونه تصاویر',
                            'field-separator'     => 'جداکننده فیلد',
                            'file-info-example'   => 'به عنوان مثال، در مورد تصاویر محصولات، فایل‌ها باید در مسیر /project-root/storage/app/import/product-images قرار گیرند.',
                            'file-info'           => 'از مسیر نسبی به /project-root/storage/app/import استفاده کنید، مثل product-images، import-images.',
                            'file'                => 'فایل',
                            'general'             => 'عمومی',
                            'images-directory'    => 'مسیر دایرکتوری تصاویر',
                            'process-in-queue'    => 'پردازش در صف',
                            'results'             => 'نتایج',
                            'save-btn'            => 'ذخیره واردات',
                            'settings'            => 'تنظیمات',
                            'skip-errors'         => 'رد کردن خطاها',
                            'stop-on-errors'      => 'توقف در خطاها',
                            'title'               => 'ویرایش واردات',
                            'type'                => 'نوع',
                            'validation-strategy' => 'استراتژی اعتبارسنجی',
                        ],
                        'import' => [
                            'back-btn'                => 'بازگشت',
                            'completed-batches'       => 'تعداد بسته‌های تکمیل شده:',
                            'download-error-report'   => 'دانلود گزارش کامل',
                            'edit-btn'                => 'ویرایش',
                            'imported-info'           => 'تبریک! واردات شما با موفقیت انجام شد.',
                            'importing-info'          => 'واردات در حال انجام',
                            'indexing-info'           => 'ایندکس‌گذاری منابع (قیمت، موجودی و جستجوی الاستیک) در حال انجام',
                            'linking-info'            => 'پیوند دادن منابع در حال انجام',
                            'progress'                => 'پیشرفت:',
                            'title'                   => 'واردات',
                            'total-batches'           => 'تعداد بسته‌ها:',
                            'total-created'           => 'کل سوابق ایجاد شده:',
                            'total-deleted'           => 'کل سوابق حذف شده:',
                            'total-errors'            => 'کل خطاها:',
                            'total-invalid-rows'      => 'کل سطرهای نامعتبر:',
                            'total-rows-processed'    => 'کل سطرهای پردازش شده:',
                            'total-updated'           => 'کل سوابق بروزرسانی شده:',
                            'validate-info'           => 'برای بررسی واردات خود، روی اعتبارسنجی داده‌ها کلیک کنید.',
                            'validate'                => 'اعتبارسنجی',
                            'validating-info'         => 'خواندن و اعتبارسنجی داده‌ها آغاز شده',
                            'validation-failed-info'  => 'واردات شما نامعتبر است. لطفاً خطاهای زیر را رفع کرده و دوباره امتحان کنید.',
                            'validation-success-info' => 'واردات شما معتبر است. روی واردات کلیک کنید تا فرایند واردات آغاز شود.',
                        ],
                        'create-success'    => 'واردات با موفقیت ایجاد شد.',
                        'delete-failed'     => 'حذف واردات به طور غیرمنتظره‌ای ناموفق بود.',
                        'delete-success'    => 'واردات با موفقیت حذف شد.',
                        'not-valid'         => 'واردات نامعتبر است',
                        'nothing-to-import' => 'هیچ منبعی برای واردات وجود ندارد.',
                        'setup-queue-error' => 'لطفاً درایور صف خود را به "database" یا "redis" تغییر دهید تا فرآیند واردات آغاز شود.',
                        'update-success'    => 'واردات با موفقیت بروزرسانی شد.',
                    ],
                ],
            ],
        ],
    ],
    'importers' => [
        'seller' => [
            'validation' => [
                'errors' => [
                    'not-found'              => 'فروشنده یافت نشد.',
                    'profile-fields-missing' => 'فیلدهای پروفایل فروشنده ناقص است: "%s".'
                ],
            ],
        ],
        'categories' => [
            'validation' => [
                'errors' => [
                    'duplicate-slug'           => 'Slug دسته‌بندی: \'%s\' بیش از یک بار در فایل واردات یافت شد.',
                    'slug_not_found_to_delete' => 'Slug دسته‌بندی: \'%s\' در سیستم یافت نشد.',
                    'invalid_display_mode'     => 'حالت نمایش: \'%s\' نامعتبر است و باید یکی از این موارد باشد: products_and_description, products_only, description_only.',
                ],
            ],
        ],
    ],
];