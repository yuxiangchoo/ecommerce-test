<?php

return [
    'admin' => [
        'data-transfer' => [
            'index' => [
                'title' => 'मार्केटप्लेस आयात'
            ],
            'imports' => [
                'index' => [
                    'button-title' => 'आयात बनाएँ',
                    'back-btn'     => 'वापस'
                ],
                'products' => [
                    'title' => 'विक्रेता उत्पाद'
                ],
                'categories' => [
                    'title' => 'श्रेणियाँ'
                ],
                'seller' => [
                    'categories' => [
                        'title' => 'विक्रेता श्रेणियाँ'
                    ],
                ],
                'create' => [
                    'marketplace'   => 'मार्केटप्लेस',
                    'set_seller'    => 'विक्रेता सेट करें',
                    'select_seller' => 'विक्रेता चुनें',
                    'upload_images' => 'छवियाँ अपलोड करें (ज़िप)',
                ]
            ]
        ],
        'menu' => [
            'data-transfer' => 'डेटा स्थानांतरण'
        ]
    ],
    'shop' => [
        'sellers' => [
            'account' => [
                'menu' => [
                    'seller-data-transfer' => 'डेटा स्थानांतरण'
                ],
                'seller-data-transfer' => [
                    'index' => [
                        'title' => 'डेटा स्थानांतरण'
                    ],
                    'imports' => [
                        'index' => [
                            'button-title'      => 'आयात बनाएँ',
                            'save-button-title' => 'आयात सहेजें',
                            'title'             => 'आयात',
                            'back-btn'          => 'वापस',
                            'datagrid' => [
                                'import'        => 'आयात',
                                'edit'          => 'संपादित करें',
                                'delete'        => 'हटाएँ',
                                'actions'       => 'क्रियाएँ',
                                'completed-at'  => 'पूरा होने की तारीख',
                                'created'       => 'निर्माण की तारीख',
                                'delete'        => 'हटाएँ',
                                'deleted'       => 'हटा दिया गया',
                                'edit'          => 'संपादित करें',
                                'error-file'    => 'त्रुटि फ़ाइल',
                                'id'            => 'आईडी',
                                'seller'        => 'विक्रेता',
                                'started-at'    => 'शुरू होने की तारीख',
                                'state'         => 'राज्य',
                                'summary'       => 'सारांश',
                                'updated'       => 'अपडेट किया गया',
                                'uploaded-file' => 'अपलोड की गई फ़ाइल',
                            ],
                        ],
                        'create' => [
                            'action'              => 'क्रिया',
                            'allowed-errors'      => 'अनुमत त्रुटियाँ',
                            'back-btn'            => 'वापस',
                            'create-update'       => 'बनाएँ/अपडेट करें',
                            'delete'              => 'हटाएँ',
                            'download-sample'     => 'नमूना डाउनलोड करें',
                            'download-sample-zip' => 'नमूना छवियाँ ज़िप डाउनलोड करें',
                            'field-separator'     => 'क्षेत्र विभाजक',
                            'file-info-example'   => 'उदाहरण के लिए, उत्पाद-छवियों के मामले में, फ़ाइलों को /project-root/storage/app/import/product-images फ़ोल्डर में रखा जाना चाहिए।',
                            'file-info'           => 'सापेक्ष पथ का उपयोग करें /project-root/storage/app/import के लिए, जैसे: product-images, import-images।',
                            'file'                => 'फ़ाइल',
                            'general'             => 'सामान्य',
                            'images-directory'    => 'छवि निर्देशिका पथ',
                            'process-in-queue'    => 'क्यू में प्रक्रिया में',
                            'results'             => 'परिणाम',
                            'save-btn'            => 'आयात सहेजें',
                            'settings'            => 'सेटिंग्स',
                            'skip-errors'         => 'त्रुटियाँ छोड़ें',
                            'stop-on-errors'      => 'त्रुटियों पर रुकें',
                            'title'               => 'आयात बनाएँ',
                            'type'                => 'प्रकार',
                            'validation-strategy' => 'मान्यता रणनीति',
                            'upload_images'       => 'छवियाँ अपलोड करें (ज़िप)',
                        ],
                        'edit' => [
                            'action'              => 'क्रिया',
                            'allowed-errors'      => 'अनुमत त्रुटियाँ',
                            'back-btn'            => 'वापस',
                            'create-update'       => 'बनाएँ/अपडेट करें',
                            'delete'              => 'हटाएँ',
                            'download-sample'     => 'नमूना डाउनलोड करें',
                            'download-sample-zip' => 'नमूना छवियाँ ज़िप डाउनलोड करें',
                            'field-separator'     => 'क्षेत्र विभाजक',
                            'file-info-example'   => 'उदाहरण के लिए, उत्पाद-छवियों के मामले में, फ़ाइलों को /project-root/storage/app/import/product-images फ़ोल्डर में रखा जाना चाहिए।',
                            'file-info'           => 'सापेक्ष पथ का उपयोग करें /project-root/storage/app/import के लिए, जैसे: product-images, import-images।',
                            'file'                => 'फ़ाइल',
                            'general'             => 'सामान्य',
                            'images-directory'    => 'छवि निर्देशिका पथ',
                            'process-in-queue'    => 'क्यू में प्रक्रिया में',
                            'results'             => 'परिणाम',
                            'save-btn'            => 'आयात सहेजें',
                            'settings'            => 'सेटिंग्स',
                            'skip-errors'         => 'त्रुटियाँ छोड़ें',
                            'stop-on-errors'      => 'त्रुटियों पर रुकें',
                            'title'               => 'आयात संपादित करें',
                            'type'                => 'प्रकार',
                            'validation-strategy' => 'मान्यता रणनीति',
                        ],
                        'import' => [
                            'back-btn'                => 'वापस',
                            'completed-batches'       => 'कुल बैच पूरे हुए:',
                            'download-error-report'   => 'पूर्ण रिपोर्ट डाउनलोड करें',
                            'edit-btn'                => 'संपादित करें',
                            'imported-info'           => 'बधाई हो! आपका आयात सफल रहा।',
                            'importing-info'          => 'आयात प्रक्रिया में है',
                            'indexing-info'           => 'संसाधनों का अनुक्रमण (मूल्य, इन्वेंटरी और इलास्टिक सर्च) चल रहा है',
                            'linking-info'            => 'संसाधनों को लिंक करना चल रहा है',
                            'progress'                => 'प्रगति:',
                            'title'                   => 'आयात',
                            'total-batches'           => 'कुल बैच:',
                            'total-created'           => 'कुल रिकॉर्ड बनाए गए:',
                            'total-deleted'           => 'कुल रिकॉर्ड हटाए गए:',
                            'total-errors'            => 'कुल त्रुटियाँ:',
                            'total-invalid-rows'      => 'कुल अमान्य पंक्तियाँ:',
                            'total-rows-processed'    => 'कुल पंक्तियाँ संसाधित की गईं:',
                            'total-updated'           => 'कुल रिकॉर्ड अपडेट किए गए:',
                            'validate-info'           => 'अपने आयात को जांचने के लिए डेटा का मान्यता पर क्लिक करें।',
                            'validate'                => 'मान्यता',
                            'validating-info'         => 'डेटा पढ़ने और मान्यकरण शुरू हो गया है',
                            'validation-failed-info'  => 'आपका आयात अमान्य है। कृपया निम्नलिखित त्रुटियों को सुधारें और फिर से प्रयास करें।',
                            'validation-success-info' => 'आपका आयात मान्य है। आयात प्रक्रिया शुरू करने के लिए आयात पर क्लिक करें।',
                        ],
                        'create-success'    => 'आयात सफलतापूर्वक बनाया गया।',
                        'delete-failed'     => 'आयात हटाने में अप्रत्याशित विफलता।',
                        'delete-success'    => 'आयात सफलतापूर्वक हटाया गया।',
                        'not-valid'         => 'आयात अमान्य है',
                        'nothing-to-import' => 'आयात करने के लिए कोई संसाधन नहीं हैं।',
                        'setup-queue-error' => 'आयात प्रक्रिया शुरू करने के लिए अपने क्यू ड्राइवर को "डाटाबेस" या "रेडिस" में बदलें।',
                        'update-success'    => 'आयात सफलतापूर्वक अपडेट किया गया।',
                    ],
                ],
            ],
        ],
    ],
    'importers' => [
        'seller' => [
            'validation' => [
                'errors' => [
                    'not-found'              => 'विक्रेता नहीं मिला।',
                    'profile-fields-missing' => 'विक्रेता प्रोफ़ाइल फ़ील्ड गायब हैं: "%s".'
                ],
            ],
        ],
        'categories' => [
            'validation' => [
                'errors' => [
                    'duplicate-slug'           => 'श्रेणी स्लग: \'%s\' आयात फ़ाइल में कई बार पाया गया।',
                    'slug_not_found_to_delete' => 'श्रेणी स्लग: \'%s\' प्रणाली में नहीं मिला।',
                    'invalid_display_mode'     => 'प्रदर्शन मोड: \'%s\' अमान्य है। मान्य विकल्प हैं: products_and_description, products_only, description_only।',
                ],
            ],
        ],
    ],
];