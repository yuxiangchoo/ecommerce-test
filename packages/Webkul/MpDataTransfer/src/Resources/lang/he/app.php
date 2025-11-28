<?php

return [
    'admin' => [
        'data-transfer' => [
            'index' => [
                'title' => 'ייבוא Marketplace'
            ],
            'imports' => [
                'index' => [
                    'button-title' => 'צור ייבוא',
                    'back-btn'     => 'חזרה'
                ],
                'products' => [
                    'title' => 'מוצרי מוכר'
                ],
                'categories' => [
                    'title' => 'קטגוריות'
                ],
                'seller' => [
                    'categories' => [
                        'title' => 'קטגוריות מוכר'
                    ],
                ],
                'create' => [
                    'marketplace'   => 'Marketplace',
                    'set_seller'    => 'הגדר מוכר',
                    'select_seller' => 'בחר מוכר',
                    'upload_images' => 'העלאת תמונות (Zip)',
                ]
            ]
        ],
        'menu' => [
            'data-transfer' => 'העברת נתונים'
        ]
    ],
    'shop' => [
        'sellers' => [
            'account' => [
                'menu' => [
                    'seller-data-transfer' => 'העברת נתונים'
                ],
                'seller-data-transfer' => [
                    'index' => [
                        'title' => 'העברת נתונים'
                    ],
                    'imports' => [
                        'index' => [
                            'button-title'      => 'צור ייבוא',
                            'save-button-title' => 'שמור ייבוא',
                            'title'             => 'ייבואים',
                            'back-btn'          => 'חזרה',
                            'datagrid' => [
                                'import'        => 'ייבוא',
                                'edit'          => 'ערוך',
                                'delete'        => 'מחק',
                                'actions'       => 'פעולות',
                                'completed-at'  => 'הושלם ב',
                                'created'       => 'נוצר',
                                'deleted'       => 'נמחק',
                                'error-file'    => 'קובץ שגיאה',
                                'id'            => 'מזהה',
                                'seller'        => 'מוכר',
                                'started-at'    => 'התחיל ב',
                                'state'         => 'מצב',
                                'summary'       => 'סיכום',
                                'updated'       => 'עודכן',
                                'uploaded-file' => 'קובץ שהועלה',
                            ],
                        ],
                        'create' => [
                            'action'              => 'פעולה',
                            'allowed-errors'      => 'שגיאות מותרות',
                            'back-btn'            => 'חזרה',
                            'create-update'       => 'צור/עדכן',
                            'delete'              => 'מחק',
                            'download-sample'     => 'הורד דוגמה',
                            'download-sample-zip' => 'הורד קובץ דחוס לדוגמה',
                            'field-separator'     => 'מפריד שדות',
                            'file-info-example'   => 'לדוגמה, במקרה של תמונות מוצר, יש למקם את הקבצים ב- /project-root/storage/app/import/product-images.',
                            'file-info'           => 'השתמש בנתיב יחסי ל- /project-root/storage/app/import, לדוגמה product-images, import-images.',
                            'file'                => 'קובץ',
                            'general'             => 'כללי',
                            'images-directory'    => 'נתיב תיקיית תמונות',
                            'process-in-queue'    => 'עיבוד בתור',
                            'results'             => 'תוצאות',
                            'save-btn'            => 'שמור ייבוא',
                            'settings'            => 'הגדרות',
                            'skip-errors'         => 'דלג על שגיאות',
                            'stop-on-errors'      => 'עצור בשגיאות',
                            'title'               => 'צור ייבוא',
                            'type'                => 'סוג',
                            'validation-strategy' => 'אסטרטגיית אימות',
                            'upload_images'       => 'העלאת תמונות (Zip)',
                        ],
                        'edit' => [
                            'action'              => 'פעולה',
                            'allowed-errors'      => 'שגיאות מותרות',
                            'back-btn'            => 'חזרה',
                            'create-update'       => 'צור/עדכן',
                            'delete'              => 'מחק',
                            'download-sample'     => 'הורד דוגמה',
                            'download-sample-zip' => 'הורד קובץ דחוס לדוגמה',
                            'field-separator'     => 'מפריד שדות',
                            'file-info-example'   => 'לדוגמה, במקרה של תמונות מוצר, יש למקם את הקבצים ב- /project-root/storage/app/import/product-images.',
                            'file-info'           => 'השתמש בנתיב יחסי ל- /project-root/storage/app/import, לדוגמה product-images, import-images.',
                            'file'                => 'קובץ',
                            'general'             => 'כללי',
                            'images-directory'    => 'נתיב תיקיית תמונות',
                            'process-in-queue'    => 'עיבוד בתור',
                            'results'             => 'תוצאות',
                            'save-btn'            => 'שמור ייבוא',
                            'settings'            => 'הגדרות',
                            'skip-errors'         => 'דלג על שגיאות',
                            'stop-on-errors'      => 'עצור בשגיאות',
                            'title'               => 'ערוך ייבוא',
                            'type'                => 'סוג',
                            'validation-strategy' => 'אסטרטגיית אימות',
                        ],
                        'import' => [
                            'back-btn'                => 'חזרה',
                            'completed-batches'       => 'סה"כ מנות שהושלמו:',
                            'download-error-report'   => 'הורד דוח מלא',
                            'edit-btn'                => 'ערוך',
                            'imported-info'           => 'מזל טוב! הייבוא שלך הצליח.',
                            'importing-info'          => 'תהליך ייבוא מתבצע',
                            'indexing-info'           => 'אינדוקס משאבים (מחיר, מלאי וחיפוש אלסטי) מתבצע',
                            'linking-info'            => 'קישור משאבים בתהליך',
                            'progress'                => 'התקדמות:',
                            'title'                   => 'ייבוא',
                            'total-batches'           => 'סה"כ מנות:',
                            'total-created'           => 'סה"כ רשומות שנוצרו:',
                            'total-deleted'           => 'סה"כ רשומות שנמחקו:',
                            'total-errors'            => 'סה"כ שגיאות:',
                            'total-invalid-rows'      => 'סה"כ שורות לא תקינות:',
                            'total-rows-processed'    => 'סה"כ שורות שעובדו:',
                            'total-updated'           => 'סה"כ רשומות שעודכנו:',
                            'validate-info'           => 'לחץ על אמת נתונים כדי לבדוק את הייבוא שלך.',
                            'validate'                => 'אמת',
                            'validating-info'         => 'תהליך קריאה ואימות נתונים מתבצע',
                            'validation-failed-info'  => 'הייבוא שלך לא תקין. תקן את השגיאות ונסה שוב.',
                            'validation-success-info' => 'הייבוא שלך תקין. לחץ על ייבוא כדי להתחיל בתהליך.',
                        ],
                        'create-success'    => 'ייבוא נוצר בהצלחה.',
                        'delete-failed'     => 'המחיקה נכשלה באופן בלתי צפוי.',
                        'delete-success'    => 'ייבוא נמחק בהצלחה.',
                        'not-valid'         => 'הייבוא אינו תקין',
                        'nothing-to-import' => 'אין משאבים לייבוא.',
                        'setup-queue-error' => 'שנה את מנהל התור שלך ל"מסד נתונים" או "redis" כדי להתחיל בתהליך הייבוא.',
                        'update-success'    => 'ייבוא עודכן בהצלחה.',
                    ],
                ],
            ],
        ],
    ],
    'importers' => [
        'seller' => [
            'validation' => [
                'errors' => [
                    'not-found'              => 'מוכר לא נמצא.',
                    'profile-fields-missing' => 'שדות פרופיל המוכר חסרים: "%s".'
                ],
            ],
        ],
        'categories' => [
            'validation' => [
                'errors' => [
                    'duplicate-slug'           => 'קטגוריה עם שם קצר: \'%s\' נמצאה יותר מפעם אחת בקובץ הייבוא.',
                    'slug_not_found_to_delete' => 'קטגוריה עם שם קצר: \'%s\' לא נמצאה במערכת.',
                    'invalid_display_mode'     => 'מצב תצוגה: \'%s\' לא תקין. עליו להיות אחד מהבאים: products_and_description, products_only, description_only.',
                ],
            ],
        ],
    ],
];
