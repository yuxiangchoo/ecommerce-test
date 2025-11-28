<?php

return [
    'admin' => [
        'data-transfer' => [
            'index' => [
                'title' => 'استيرادات السوق'
            ],
            'imports' => [
                'index' => [
                    'button-title' => 'إنشاء استيراد',
                    'back-btn'     => 'رجوع'
                ],
                'products' => [
                    'title' => 'منتجات البائع'
                ],
                'categories' => [
                    'title'  => 'الفئات'
                ],
                'seller' => [
                    'categories' => [
                        'title'  => 'فئات البائع'
                    ],
                ],
                'create' => [
                    'marketplace'   => 'السوق',
                    'set_seller'    => 'تحديد البائع',
                    'select_seller' => 'اختر البائع',
                    'upload_images' => 'تحميل الصور (Zip)',
                ],
            ],
        ],
        'menu' => [
            'data-transfer' => 'نقل البيانات'
        ],
    ],

    'shop' => [
        'sellers' => [
            'account' => [
                'menu' => [
                    'seller-data-transfer' => 'نقل البيانات'
                ],
                'seller-data-transfer' => [
                    'index' => [
                        'title' => 'نقل البيانات'
                    ],
                    'imports' => [
                        'index' => [
                            'button-title'      => 'إنشاء استيراد',
                            'save-button-title' => 'حفظ الاستيراد',
                            'title'             => 'الاستيرادات',
                            'back-btn'          => 'رجوع',
                            'datagrid'    => [
                                'import'        => 'استيراد',
                                'edit'          => 'تعديل',
                                'delete'        => 'حذف',
                                'actions'       => 'الإجراءات',
                                'completed-at'  => 'أكمل في',
                                'created'       => 'أنشئ',
                                'deleted'       => 'تم الحذف',
                                'error-file'    => 'ملف الأخطاء',
                                'id'            => 'المعرف',
                                'seller'        => 'بائع',
                                'started-at'    => 'بدأ في',
                                'state'         => 'الحالة',
                                'summary'       => 'الملخص',
                                'updated'       => 'تم التحديث',
                                'uploaded-file' => 'الملف المرفوع',
                            ],
                        ],
                        'create' => [
                            'action'              => 'الإجراء',
                            'allowed-errors'      => 'الأخطاء المسموح بها',
                            'back-btn'            => 'رجوع',
                            'create-update'       => 'إنشاء/تحديث',
                            'delete'              => 'حذف',
                            'download-sample'     => 'تنزيل النموذج',
                            'download-sample-zip' => 'تنزيل نموذج صور مضغوط',
                            'field-separator'     => 'فاصل الحقول',
                            'file-info-example'   => 'على سبيل المثال، في حالة صور المنتجات، يجب وضع الملفات في المجلد /project-root/storage/app/import/product-images.',
                            'file-info'           => 'استخدم المسار النسبي إلى /project-root/storage/app/import، مثل product-images، import-images.',
                            'file'                => 'الملف',
                            'general'             => 'عام',
                            'images-directory'    => 'مسار مجلد الصور',
                            'process-in-queue'    => 'معالجة في قائمة الانتظار',
                            'results'             => 'النتائج',
                            'save-btn'            => 'حفظ الاستيراد',
                            'settings'            => 'الإعدادات',
                            'skip-errors'         => 'تخطي الأخطاء',
                            'stop-on-errors'      => 'توقف عند الأخطاء',
                            'title'               => 'إنشاء استيراد',
                            'type'                => 'النوع',
                            'validation-strategy' => 'استراتيجية التحقق',
                            'upload_images'       => 'تحميل الصور (Zip)',
                        ],
                        'edit' => [
                            'action'              => 'الإجراء',
                            'allowed-errors'      => 'الأخطاء المسموح بها',
                            'back-btn'            => 'رجوع',
                            'create-update'       => 'إنشاء/تحديث',
                            'delete'              => 'حذف',
                            'download-sample'     => 'تنزيل النموذج',
                            'download-sample-zip' => 'تنزيل نموذج صور مضغوط',
                            'field-separator'     => 'فاصل الحقول',
                            'file-info-example'   => 'على سبيل المثال، في حالة صور المنتجات، يجب وضع الملفات في المجلد /project-root/storage/app/import/product-images.',
                            'file-info'           => 'استخدم المسار النسبي إلى /project-root/storage/app/import، مثل product-images، import-images.',
                            'file'                => 'الملف',
                            'general'             => 'عام',
                            'images-directory'    => 'مسار مجلد الصور',
                            'process-in-queue'    => 'معالجة في قائمة الانتظار',
                            'results'             => 'النتائج',
                            'save-btn'            => 'حفظ الاستيراد',
                            'settings'            => 'الإعدادات',
                            'skip-errors'         => 'تخطي الأخطاء',
                            'stop-on-errors'      => 'توقف عند الأخطاء',
                            'title'               => 'تعديل الاستيراد',
                            'type'                => 'النوع',
                            'validation-strategy' => 'استراتيجية التحقق',
                        ],
                        'import' => [
                            'back-btn'                => 'رجوع',
                            'completed-batches'       => 'إجمالي الدفعات المكتملة:',
                            'download-error-report'   => 'تنزيل التقرير الكامل',
                            'edit-btn'                => 'تعديل',
                            'imported-info'           => 'تهانينا! تم الاستيراد بنجاح.',
                            'importing-info'          => 'الاستيراد قيد التنفيذ',
                            'indexing-info'           => 'فهرسة الموارد (الأسعار، المخزون، والبحث المرن) قيد التقدم',
                            'linking-info'            => 'ربط الموارد قيد التقدم',
                            'progress'                => 'التقدم:',
                            'title'                   => 'استيراد',
                            'total-batches'           => 'إجمالي الدفعات:',
                            'total-created'           => 'إجمالي السجلات التي تم إنشاؤها:',
                            'total-deleted'           => 'إجمالي السجلات المحذوفة:',
                            'total-errors'            => 'إجمالي الأخطاء:',
                            'total-invalid-rows'      => 'إجمالي الصفوف غير الصالحة:',
                            'total-rows-processed'    => 'إجمالي الصفوف التي تمت معالجتها:',
                            'total-updated'           => 'إجمالي السجلات التي تم تحديثها:',
                            'validate-info'           => 'انقر على "تحقق من البيانات" للتحقق من استيرادك.',
                            'validate'                => 'التحقق',
                            'validating-info'         => 'تم البدء في قراءة البيانات والتحقق منها',
                            'validation-failed-info'  => 'استيرادك غير صالح. الرجاء إصلاح الأخطاء التالية والمحاولة مرة أخرى.',
                            'validation-success-info' => 'استيرادك صالح. انقر على "استيراد" لبدء عملية الاستيراد.',
                        ],
                        'create-success'    => 'تم إنشاء الاستيراد بنجاح.',
                        'delete-failed'     => 'فشل حذف الاستيراد بشكل غير متوقع.',
                        'delete-success'    => 'تم حذف الاستيراد بنجاح.',
                        'not-valid'         => 'الاستيراد غير صالح',
                        'nothing-to-import' => 'لا توجد موارد للاستيراد.',
                        'setup-queue-error' => 'يرجى تغيير مشغل قائمة الانتظار إلى "database" أو "redis" لبدء عملية الاستيراد.',
                        'update-success'    => 'تم تحديث الاستيراد بنجاح.',
                    ],
                ],
            ],
        ],
    ],

    'importers' => [
        'seller' => [
            'validation' => [
                'errors' => [
                    'not-found'              => 'لم يتم العثور على البائع.',
                    'profile-fields-missing' => 'حقول ملف البائع مفقودة: "%s".'
                ],
            ],
        ],
        'categories' => [
            'validation' => [
                'errors' => [
                    'duplicate-slug'           => 'المعرّف الفريد للفئة: \'%s\' موجود أكثر من مرة في ملف الاستيراد.',
                    'slug_not_found_to_delete' => 'المعرّف الفريد للفئة: \'%s\' غير موجود في النظام.',
                    'invalid_display_mode'     => 'وضع العرض: \'%s\' غير صالح، يجب أن يكون أحد هذه الخيارات: products_and_description, products_only, description_only.',
                ],
            ],
        ],
    ],
];
