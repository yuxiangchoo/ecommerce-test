<?php

return [
    'admin' => [
        'data-transfer' => [
            'index' => [
                'title' => 'Marketplace Imports'
            ],
            'imports' => [
                'index' => [
                    'button-title' => 'Create Import',
                    'back-btn'     => 'Back'
                ],
                'products' => [
                    'title' => 'Seller Products'
                ],
                'categories' => [
                    'title' => 'Categories'
                ],
                'seller' => [
                    'categories' => [
                        'title' => 'Seller Categories'
                    ],  
                ],
                'create' => [
                    'marketplace'   => 'Marketplace',
                    'set_seller'    => 'Set Seller',
                    'select_seller' => 'Select Seller',
                    'upload_images' => 'Upload Images (Zip)',
                ]
            ]
        ],
        'menu' => [
            'data-transfer' => 'Data Transfer'
        ]
    ],
    'shop' => [
        'sellers' => [
            'account' => [
                'menu' => [
                    'seller-data-transfer' => 'Data Transfer'
                ],
                'seller-data-transfer' => [
                    'index' => [
                        'title' => 'Data Transfer'
                    ],
                    'imports' => [
                        'index' => [
                            'button-title'      => 'Create Import',
                            'save-button-title' => 'Save Import',
                            'title'             => 'Imports',
                            'back-btn'          => 'Back',
                            'datagrid' => [
                                'import'        => 'Import',
                                'edit'          => 'Edit',
                                'delete'        => 'Delete',
                                'actions'       => 'Actions',
                                'completed-at'  => 'Completed At',
                                'created'       => 'Created',
                                'delete'        => 'Delete',
                                'deleted'       => 'Deleted',
                                'edit'          => 'Edit',
                                'error-file'    => 'Error File',
                                'id'            => 'ID',
                                'seller'        => 'Seller',
                                'started-at'    => 'Started At',
                                'state'         => 'State',
                                'summary'       => 'Summary',
                                'updated'       => 'Updated',
                                'uploaded-file' => 'Uploaded File',
                            ],
                        ],
                        'create' => [
                            'action'              => 'Action',
                            'allowed-errors'      => 'Allowed Errors',
                            'back-btn'            => 'Back',
                            'create-update'       => 'Create/Update',
                            'delete'              => 'Delete',
                            'download-sample'     => 'Download Sample',
                            'download-sample-zip' => 'Download Sample Images Zip',
                            'field-separator'     => 'Field Separator',
                            'file-info-example'   => 'For example, in case product-images, files should be placed into /project-root/storage/app/import/product-images folder.',
                            'file-info'           => 'Use relative path to /project-root/storage/app/import, e.g. product-images, import-images.',
                            'file'                => 'File',
                            'general'             => 'General',
                            'images-directory'    => 'Images Directory Path',
                            'process-in-queue'    => 'Process In Queue',
                            'results'             => 'Results',
                            'save-btn'            => 'Save Import',
                            'settings'            => 'Settings',
                            'skip-errors'         => 'Skip Errors',
                            'stop-on-errors'      => 'Stop on Errors',
                            'title'               => 'Create Import',
                            'type'                => 'Type',
                            'validation-strategy' => 'Validation Strategy',
                            'upload_images'       => 'Upload Images (Zip)',
                        ],
                        'edit' => [
                            'action'              => 'Action',
                            'allowed-errors'      => 'Allowed Errors',
                            'back-btn'            => 'Back',
                            'create-update'       => 'Create/Update',
                            'delete'              => 'Delete',
                            'download-sample'     => 'Download Sample',
                            'download-sample-zip' => 'Download Sample Images Zip',
                            'field-separator'     => 'Field Separator',
                            'file-info-example'   => 'For example, in case product-images, files should be placed into /project-root/storage/app/import/product-images folder.',
                            'file-info'           => 'Use relative path to /project-root/storage/app/import, e.g. product-images, import-images.',
                            'file'                => 'File',
                            'general'             => 'General',
                            'images-directory'    => 'Images Directory Path',
                            'process-in-queue'    => 'Process In Queue',
                            'results'             => 'Results',
                            'save-btn'            => 'Save Import',
                            'settings'            => 'Settings',
                            'skip-errors'         => 'Skip Errors',
                            'stop-on-errors'      => 'Stop on Errors',
                            'title'               => 'Edit Import',
                            'type'                => 'Type',
                            'validation-strategy' => 'Validation Strategy',
                        ],                        
                        'import' => [
                            'back-btn'                => 'Back',
                            'completed-batches'       => 'Total Batches Completed:',
                            'download-error-report'   => 'Download Full Report',
                            'edit-btn'                => 'Edit',
                            'imported-info'           => 'Congratulations! Your import was successful.',
                            'importing-info'          => 'Import In Process',
                            'indexing-info'           => 'Resources Indexing (Price, Inventory and Elastic Search) In Progress',
                            'linking-info'            => 'Resources Linking In Progress',
                            'progress'                => 'Progress:',
                            'title'                   => 'Import',
                            'total-batches'           => 'Total Batches:',
                            'total-created'           => 'Total Records Created:',
                            'total-deleted'           => 'Total Records Deleted:',
                            'total-errors'            => 'Total Errors:',
                            'total-invalid-rows'      => 'Total Invalid Rows:',
                            'total-rows-processed'    => 'Total Rows Processed:',
                            'total-updated'           => 'Total Records Updated:',
                            'validate-info'           => 'Click on Validate Data to check your import.',
                            'validate'                => 'Validate',
                            'validating-info'         => 'The data started reading and Validating',
                            'validation-failed-info'  => 'Your import is invalid. Please fix the following errors and try again.',
                            'validation-success-info' => 'Your import is valid. Click on Import to start the import process.',
                        ],
                        'create-success'    => 'Import created successfully.',
                        'delete-failed'     => 'Import deletion failed unexpectedly.',
                        'delete-success'    => 'Import deleted successfully.',
                        'not-valid'         => 'Import is invalid',
                        'nothing-to-import' => 'There are no resources to import.',
                        'setup-queue-error' => 'Please change your queue driver to "database" or "redis" to start the import process.',
                        'update-success'    => 'Import updated successfully.',
                    ],
                ],
            ],
        ],
    ],
    'importers' => [
        'seller' => [
            'validation' => [
                'errors' => [
                    'not-found'              => 'Seller not found.',
                    'profile-fields-missing' => 'Seller profile fields missing: "%s".'
                ],
            ],
        ],
        'categories' => [
            'validation' => [
                'errors' => [
                    'duplicate-slug'           => 'Category Slug : \'%s\' is found more than once in the import file.',
                    'slug_not_found_to_delete' => 'Category Slug : \'%s\' not found in the system.',
                    'invalid_display_mode'     => 'Display Mode : \'%s\' is invalid it must be one of these products_and_description, products_only, description_only.',
                ],
            ],
        ],
    ],
];
