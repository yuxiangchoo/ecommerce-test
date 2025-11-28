<?php

return [
    'admin' => [
        'data-transfer' => [
            'index' => [
                'title' => 'মার্কেটপ্লেস আমদানি'
            ],
            'imports' => [
                'index' => [
                    'button-title' => 'আমদানি তৈরি করুন',
                    'back-btn'     => 'ফিরে যান'
                ],
                'products' => [
                    'title' => 'বিক্রেতা পণ্যসমূহ'
                ],
                'categories' => [
                    'title' => 'বিভাগসমূহ'
                ],
                'seller' => [
                    'categories' => [
                        'title' => 'বিক্রেতার বিভাগসমূহ'
                    ],
                ],
                'create' => [
                    'marketplace'   => 'মার্কেটপ্লেস',
                    'set_seller'    => 'বিক্রেতা নির্ধারণ করুন',
                    'select_seller' => 'বিক্রেতা নির্বাচন করুন',
                    'upload_images' => 'ছবি আপলোড করুন (জিপ)',
                ]
            ]
        ],
        'menu' => [
            'data-transfer' => 'ডাটা স্থানান্তর'
        ]
    ],
    'shop' => [
        'sellers' => [
            'account' => [
                'menu' => [
                    'seller-data-transfer' => 'ডাটা স্থানান্তর'
                ],
                'seller-data-transfer' => [
                    'index' => [
                        'title' => 'ডাটা স্থানান্তর'
                    ],
                    'imports' => [
                        'index' => [
                            'button-title'      => 'আমদানি তৈরি করুন',
                            'save-button-title' => 'আমদানি সংরক্ষণ করুন',
                            'title'             => 'আমদানিসমূহ',
                            'back-btn'          => 'ফিরে যান',
                            'datagrid' => [
                                'import'        => 'আমদানি',
                                'edit'          => 'সম্পাদনা',
                                'delete'        => 'মুছে ফেলুন',
                                'actions'       => 'কার্যকলাপসমূহ',
                                'completed-at'  => 'সমাপ্তির সময়',
                                'created'       => 'তৈরি করা হয়েছে',
                                'deleted'       => 'মুছে ফেলা হয়েছে',
                                'edit'          => 'সম্পাদনা',
                                'error-file'    => 'ত্রুটির ফাইল',
                                'id'            => 'আইডি',
                                'seller'        => 'বিক্রেতা',
                                'started-at'    => 'শুরু সময়',
                                'state'         => 'অবস্থা',
                                'summary'       => 'সারাংশ',
                                'updated'       => 'আপডেট করা হয়েছে',
                                'uploaded-file' => 'আপলোডকৃত ফাইল',
                            ],
                        ],
                        'create' => [
                            'action'              => 'ক্রিয়া',
                            'allowed-errors'      => 'অনুমোদিত ত্রুটি',
                            'back-btn'            => 'ফিরে যান',
                            'create-update'       => 'তৈরি/আপডেট করুন',
                            'delete'              => 'মুছে ফেলুন',
                            'download-sample'     => 'নমুনা ডাউনলোড করুন',
                            'download-sample-zip' => 'ছবি জিপ নমুনা ডাউনলোড করুন',
                            'field-separator'     => 'ফিল্ড বিভাজক',
                            'file-info-example'   => 'যেমন, পণ্য-ছবি ক্ষেত্রে, ফাইলগুলো /project-root/storage/app/import/product-images ফোল্ডারে থাকা উচিত।',
                            'file-info'           => 'আপনার আপলোডের জন্য আনুপাতিক পথ ব্যবহার করুন, যেমন product-images, import-images।',
                            'file'                => 'ফাইল',
                            'general'             => 'সাধারণ',
                            'images-directory'    => 'ছবি ডিরেক্টরি পথ',
                            'process-in-queue'    => 'কিউতে প্রক্রিয়াকরণ',
                            'results'             => 'ফলাফল',
                            'save-btn'            => 'আমদানি সংরক্ষণ করুন',
                            'settings'            => 'সেটিংস',
                            'skip-errors'         => 'ত্রুটি এড়িয়ে চলুন',
                            'stop-on-errors'      => 'ত্রুটিতে থামুন',
                            'title'               => 'আমদানি তৈরি করুন',
                            'type'                => 'ধরন',
                            'validation-strategy' => 'যাচাইকরণ কৌশল',
                            'upload_images'       => 'ছবি আপলোড করুন (জিপ)',
                        ],
                        'edit' => [
                            'action'              => 'ক্রিয়া',
                            'allowed-errors'      => 'অনুমোদিত ত্রুটি',
                            'back-btn'            => 'ফিরে যান',
                            'create-update'       => 'তৈরি/আপডেট করুন',
                            'delete'              => 'মুছে ফেলুন',
                            'download-sample'     => 'নমুনা ডাউনলোড করুন',
                            'download-sample-zip' => 'ছবি জিপ নমুনা ডাউনলোড করুন',
                            'field-separator'     => 'ফিল্ড বিভাজক',
                            'file-info-example'   => 'যেমন, পণ্য-ছবি ক্ষেত্রে, ফাইলগুলো /project-root/storage/app/import/product-images ফোল্ডারে থাকা উচিত।',
                            'file-info'           => 'আপনার আপলোডের জন্য আনুপাতিক পথ ব্যবহার করুন, যেমন product-images, import-images।',
                            'file'                => 'ফাইল',
                            'general'             => 'সাধারণ',
                            'images-directory'    => 'ছবি ডিরেক্টরি পথ',
                            'process-in-queue'    => 'কিউতে প্রক্রিয়াকরণ',
                            'results'             => 'ফলাফল',
                            'save-btn'            => 'আমদানি সংরক্ষণ করুন',
                            'settings'            => 'সেটিংস',
                            'skip-errors'         => 'ত্রুটি এড়িয়ে চলুন',
                            'stop-on-errors'      => 'ত্রুটিতে থামুন',
                            'title'               => 'আমদানি সম্পাদনা করুন',
                            'type'                => 'ধরন',
                            'validation-strategy' => 'যাচাইকরণ কৌশল',
                        ],
                        'import' => [
                            'back-btn'                => 'ফিরে যান',
                            'completed-batches'       => 'মোট ব্যাচ সম্পন্ন হয়েছে:',
                            'download-error-report'   => 'সম্পূর্ণ রিপোর্ট ডাউনলোড করুন',
                            'edit-btn'                => 'সম্পাদনা করুন',
                            'imported-info'           => 'অভিনন্দন! আপনার আমদানি সফল হয়েছে।',
                            'importing-info'          => 'আমদানি প্রক্রিয়াধীন',
                            'indexing-info'           => 'রিসোর্স ইনডেক্সিং (মূল্য, ইনভেন্টরি এবং ইলাস্টিক সার্চ) প্রক্রিয়াধীন',
                            'linking-info'            => 'রিসোর্স লিংকিং প্রক্রিয়াধীন',
                            'progress'                => 'অগ্রগতি:',
                            'title'                   => 'আমদানি',
                            'total-batches'           => 'মোট ব্যাচ:',
                            'total-created'           => 'মোট রেকর্ড তৈরি হয়েছে:',
                            'total-deleted'           => 'মোট রেকর্ড মুছে ফেলা হয়েছে:',
                            'total-errors'            => 'মোট ত্রুটি:',
                            'total-invalid-rows'      => 'মোট অবৈধ সারি:',
                            'total-rows-processed'    => 'মোট সারি প্রক্রিয়াকৃত হয়েছে:',
                            'total-updated'           => 'মোট রেকর্ড আপডেট হয়েছে:',
                            'validate-info'           => 'আপনার আমদানি যাচাই করতে Validate Data ক্লিক করুন।',
                            'validate'                => 'যাচাই করুন',
                            'validating-info'         => 'তথ্য পড়া ও যাচাই শুরু হয়েছে',
                            'validation-failed-info'  => 'আপনার আমদানি অবৈধ। দয়া করে নিচের ত্রুটিগুলি ঠিক করুন এবং আবার চেষ্টা করুন।',
                            'validation-success-info' => 'আপনার আমদানি বৈধ। আমদানি প্রক্রিয়া শুরু করতে Import ক্লিক করুন।',
                        ],
                        'create-success'    => 'আমদানি সফলভাবে তৈরি হয়েছে।',
                        'delete-failed'     => 'আমদানি মুছে ফেলা অপ্রত্যাশিতভাবে ব্যর্থ হয়েছে।',
                        'delete-success'    => 'আমদানি সফলভাবে মুছে ফেলা হয়েছে।',
                        'not-valid'         => 'আমদানি অবৈধ',
                        'nothing-to-import' => 'আমদানির জন্য কোনো রিসোর্স নেই।',
                        'setup-queue-error' => 'আমদানি প্রক্রিয়া শুরু করতে দয়া করে আপনার কিউ ড্রাইভার "ডাটাবেস" বা "রেডিস" এ পরিবর্তন করুন।',
                        'update-success'    => 'আমদানি সফলভাবে আপডেট হয়েছে।',
                    ],
                ],
            ],
        ],
    ],
    'importers' => [
        'seller' => [
            'validation' => [
                'errors' => [
                    'not-found'              => 'বিক্রেতা খুঁজে পাওয়া যায়নি।',
                    'invalid-row-found'      => 'অবৈধ সারি পাওয়া গেছে।',
                    'invalid-file-type'      => 'অবৈধ ফাইল প্রকার। শুধুমাত্র :name ফাইল গ্রহণযোগ্য।',
                    'field-required'         => ':field প্রয়োজনীয়।',
                    'field-required-in-file' => ':field ফাইলের প্রয়োজনীয়।',
                    'min-row-error'          => 'অন্তত একটি সারি থাকলে আমদানি বৈধ হবে।',
                    'only-csv'               => 'ফাইল অবশ্যই CSV ধরনের হতে হবে।',
                ],
                'validate' => [
                    'field-not-found' => 'ফাইলের প্রধান সারিতে প্রয়োজনীয় ক্ষেত্রটি :field পাওয়া যায়নি।',
                ],
            ]
        ]
    ]
];

