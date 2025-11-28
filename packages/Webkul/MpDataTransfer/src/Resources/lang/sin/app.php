<?php

return [
     'admin' => [
        'data-transfer' => [
            'index' => [
                'title' => 'වෙළඳපොළ ආනයන'
            ],
            'imports' => [
                'index' => [
                    'button-title' => 'ආනයන සාදන්න',
                    'back-btn'     => 'පසුපස'
                ],
                'products' => [
                    'title' => 'කෙනෙකුගේ නිෂ්පාදන'
                ],
                'categories' => [
                    'title' => 'කාණ්ඩ'
                ],
                'seller' => [
                    'categories' => [
                        'title' => 'කෙනෙකුගේ කාණ්ඩ'
                    ],
                ],
                'create' => [
                    'marketplace'   => 'වෙළඳපොළ',
                    'set_seller'    => 'කෙනෙකු සකසන්න',
                    'select_seller' => 'කෙනෙකු තෝරන්න',
                    'upload_images' => 'පින්තූර ඇතුළත් කරන්න (Zip)',
                ]
            ]
        ],
        'menu' => [
            'data-transfer' => 'දත්ත මාරු කිරීම'
        ]
    ],
    'shop' => [
        'sellers' => [
            'account' => [
                'menu' => [
                    'seller-data-transfer' => 'දත්ත මාරු කිරීම'
                ],
                'seller-data-transfer' => [
                    'index' => [
                        'title' => 'දත්ත මාරු කිරීම',
                        'imports' => [
                            'index' => [
                                'button-title'      => 'ආනයන සාදන්න',
                                'save-button-title' => 'ආනයන සුරකින්න',
                                'title'             => 'ආනයන',
                                'back-btn'          => 'පසුපස',
                                'datagrid' => [
                                    'import'        => 'ආනයන',
                                    'edit'          => 'සංස්කරණය කරන්න',
                                    'delete'        => 'ඉවත් කරන්න',
                                    'actions'       => ' ක්‍රියා',
                                    'completed-at'  => 'සම්පූර්ණ කරන ලදී',
                                    'created'       => 'සැකසී',
                                    'delete'        => 'ඉවත් කරන්න',
                                    'deleted'       => 'ඉවත් කරන ලදී',
                                    'edit'          => 'සංස්කරණය කරන්න',
                                    'error-file'    => 'දෝෂ ගොනුව',
                                    'id'            => 'ID',
                                    'seller'        => 'කෙනෙකු',
                                    'started-at'    => 'ආරම්භ කරන ලදී',
                                    'state'         => 'අවසාන',
                                    'summary'       => 'සාරාංශය',
                                    'updated'       => 'නවතම',
                                    'uploaded-file' => 'ඇතුළත් කරන ලද ගොනුව',
                                ],
                            ],
                            'create' => [
                                'action'              => 'ක්‍රියාව',
                                'allowed-errors'      => 'අනුමත දෝෂ',
                                'back-btn'            => 'පසුපස',
                                'create-update'       => 'සකස්/නැවත ගැසීම්',
                                'delete'              => 'ඉවත් කරන්න',
                                'download-sample'     => 'නැණැමැන් ගොනුවක් බාගන්න',
                                'download-sample-zip' => 'නැණැමැන් පින්තූර Zip බාගන්න',
                                'field-separator'     => 'මේසය භාවිතා කරන්න',
                                'file-info-example'   => 'උදාහරණයක් ලෙස, නිෂ්පාදන පින්තූර සඳහා ගොනු /project-root/storage/app/import/product-images මාර්ගය යටතේ පවතින යුතුය.',
                                'file-info'           => 'ඔබේ ප්‍රොජෙක්ට් පදනමට ගොනු භාවිතා කරන්න, උදාහරණයක් වශයෙන් product-images, import-images.',
                                'file'                => 'ගොනුව',
                                'general'             => 'සාමාන්‍ය',
                                'images-directory'    => 'පින්තූර නිකුත් පාර',
                                'process-in-queue'    => 'පැහැදිලිව සැකසෙයි',
                                'results'             => 'ප්‍රතිඵල',
                                'save-btn'            => 'ආනයන සුරකින්න',
                                'settings'            => 'සැකසුම්',
                                'skip-errors'         => 'දෝෂ ඉක්මවා යන්න',
                                'stop-on-errors'      => 'දෝෂ මත නවත්වන්න',
                                'title'               => 'ආනයන සාදන්න',
                                'type'                => 'වර්ගය',
                                'validation-strategy' => 'වලංගුකම සහතික කිරීම',
                                'upload_images'       => 'පින්තූර ඇතුළත් කරන්න (Zip)',
                            ],
                            'edit' => [
                                'action'              => 'ක්‍රියාව',
                                'allowed-errors'      => 'අනුමත දෝෂ',
                                'back-btn'            => 'පසුපස',
                                'create-update'       => 'සකස්/නැවත ගැසීම්',
                                'delete'              => 'ඉවත් කරන්න',
                                'download-sample'     => 'නැණැමැන් ගොනුවක් බාගන්න',
                                'download-sample-zip' => 'නැණැමැන් පින්තූර Zip බාගන්න',
                                'field-separator'     => 'මේසය භාවිතා කරන්න',
                                'file-info-example'   => 'උදාහරණයක් ලෙස, නිෂ්පාදන පින්තූර සඳහා ගොනු /project-root/storage/app/import/product-images මාර්ගය යටතේ පවතින යුතුය.',
                                'file-info'           => 'ඔබේ ප්‍රොජෙක්ට් පදනමට ගොනු භාවිතා කරන්න, උදාහරණයක් වශයෙන් product-images, import-images.',
                                'file'                => 'ගොනුව',
                                'general'             => 'සාමාන්‍ය',
                                'images-directory'    => 'පින්තූර නිකුත් පාර',
                                'process-in-queue'    => 'පැහැදිලිව සැකසෙයි',
                                'results'             => 'ප්‍රතිඵල',
                                'save-btn'            => 'ආනයන සුරකින්න',
                                'settings'            => 'සැකසුම්',
                                'skip-errors'         => 'දෝෂ ඉක්මවා යන්න',
                                'stop-on-errors'      => 'දෝෂ මත නවත්වන්න',
                                'title'               => 'ආනයන සංස්කරණය කරන්න',
                                'type'                => 'වර්ගය',
                                'validation-strategy' => 'වලංගුකම සහතික කිරීම',
                            ],
                            'import' => [
                                'back-btn'                => 'පසුපස',
                                'completed-batches'       => 'සම්පූර්ණ කරන ලද පරමාණය:',
                                'download-error-report'   => 'සම්පූර්ණ වාර්තාව බාගන්න',
                                'edit-btn'                => 'සංස්කරණය කරන්න',
                                'imported-info'           => 'ඔබේ ආනයනය සාර්ථකයි!',
                                'importing-info'          => 'ආනයනය කිරීමේදී',
                                'indexing-info'           => 'සම්පත් ඉදිරියට යන තැන පවතී',
                                'linking-info'            => 'සම්පත් සම්බන්ධ කිරීමේදී',
                                'progress'                => 'ආකාරය:',
                                'title'                   => 'ආනයනය',
                                'total-batches'           => 'පරමාණය:',
                                'total-created'           => 'සම්පූර්ණ වූ සටහන්:',
                                'total-deleted'           => 'සම්පූර්ණ වූ සටහන් ඉවත් කරන්න:',
                                'total-errors'            => 'සම්පූර්ණ දෝෂ:',
                                'total-invalid-rows'      => 'සම්පූර්ණ කණගාටුතම තීරු:',
                                'total-rows-processed'    => 'සම්පූර්ණ පියවර පැහැදිලිව:',
                                'total-updated'           => 'සම්පූර්ණ වූ සටහන් යාවත්කාලීන කරයි:',
                                'validate-info'           => 'ඔබේ ආනයනය පරික්ෂා කිරීමට සහ අත්දැකීමේ බලන්න.',
                                'validate'                => 'වලංගුකම',
                                'validating-info'         => 'දත්ත ඉදිරිපත් කරන ලදී',
                                'validation-failed-info'  => 'ඔබේ ආනයනය වලංගු නොවේ. කරුණාකර මෙම දෝෂ සකසන්න සහ නැවත උත්සාහ කරන්න',
                                'validation-success-info' => 'ඔබේ ආනයනය වලංගුයි. ආනයන ක්‍රියාවලිය ආරම්භ කිරීමට "ආනයන කරන්න" ක්ලික් කරන්න.',
                            ],
                            'create-success'    => 'ආනයන සාර්ථකව සාදා ගෙන ඇත.',
                            'delete-failed'     => 'ආනයන ඉවත් කිරීම නොහැකිය.',
                            'delete-success'    => 'ආනයන සාර්ථකව ඉවත් කරන ලදී.',
                            'not-valid'         => 'ආනයනය වලංගු නැත',
                            'nothing-to-import' => 'ආනයන කිරීමට කුමක් හෝ නැත.',
                            'setup-queue-error' => 'ආනයන ක්‍රියාවලිය ආරම්භ කිරීමට "දත්ත සමුදා" හෝ "රිදිස්" යොදා ගැනීම යාවත්කාලීන කරන්න.',
                            'update-success'    => 'ආනයන සාර්ථකව යාවත්කාලීන කරන ලදී.',
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
                    'not-found'              => 'කෙනෙකු නොහඳුනාගත.',
                    'profile-fields-missing' => 'කෙනෙකුගේ පැතිකඩ ක්ෂේත්‍ර අහිමි: "%s".'
                ],
            ],
        ],
        'categories' => [
            'validation' => [
                'errors' => [
                    'duplicate-slug'           => 'කාණ්ඩ ස්ලග් : \'%s\' ආනයන ගොනුවේ වඩාත්ම වරක් පැවතී.',
                    'slug_not_found_to_delete' => 'කාණ්ඩ ස්ලග් : \'%s\' පද්ධතියේ හමු නොවේ.',
                    'invalid_display_mode'     => 'පෙන්වන්නාගේ ක්‍රමය : \'%s\' වලංගු නැත, මෙවැනි ඕනෑම වර්ගයකින් එකක් විය යුතුය: products_and_description, products_only, description_only.',
                ],
            ],
        ],
    ],
];