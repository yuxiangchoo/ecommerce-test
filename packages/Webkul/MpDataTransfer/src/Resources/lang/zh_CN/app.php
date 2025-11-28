<?php

return [
    'admin' => [
        'data-transfer' => [
            'index' => [
                'title' => '市场导入'
            ],
            'imports' => [
                'index' => [
                    'button-title' => '创建导入',
                    'back-btn'     => '返回'
                ],
                'products' => [
                    'title' => '卖家产品'
                ],
                'categories' => [
                    'title' => '分类'
                ],
                'seller' => [
                    'categories' => [
                        'title' => '卖家分类'
                    ],
                ],
                'create' => [
                    'marketplace'   => '市场',
                    'set_seller'    => '设置卖家',
                    'select_seller' => '选择卖家',
                    'upload_images' => '上传图片（Zip）',
                ]
            ]
        ],
        'menu' => [
            'data-transfer' => '数据传输'
        ]
    ],
    'shop' => [
        'sellers' => [
            'account' => [
                'menu' => [
                    'seller-data-transfer' => '数据传输'
                ],
                'seller-data-transfer' => [
                    'index' => [
                        'title' => '数据传输',
                        'imports' => [
                            'index' => [
                                'button-title'      => '创建导入',
                                'save-button-title' => '保存导入',
                                'title'             => '导入',
                                'back-btn'          => '返回',
                                'datagrid' => [
                                    'import'        => '导入',
                                    'edit'          => '编辑',
                                    'delete'        => '删除',
                                    'actions'       => '操作',
                                    'completed-at'  => '完成时间',
                                    'created'       => '创建时间',
                                    'deleted'       => '已删除',
                                    'error-file'    => '错误文件',
                                    'id'            => 'ID',
                                    'seller'        => '卖家',
                                    'started-at'    => '开始时间',
                                    'state'         => '状态',
                                    'summary'       => '摘要',
                                    'updated'       => '更新时间',
                                    'uploaded-file' => '已上传文件',
                                ],
                            ],
                            'create' => [
                                'action'              => '操作',
                                'allowed-errors'      => '允许的错误数',
                                'back-btn'            => '返回',
                                'create-update'       => '创建/更新',
                                'delete'              => '删除',
                                'download-sample'     => '下载示例',
                                'download-sample-zip' => '下载示例图片压缩包',
                                'field-separator'     => '字段分隔符',
                                'file-info-example'   => '例如，产品图片应放置在 /project-root/storage/app/import/product-images 文件夹中。',
                                'file-info'           => '使用相对于 /project-root/storage/app/import 的相对路径，例如 product-images, import-images。',
                                'file'                => '文件',
                                'general'             => '常规',
                                'images-directory'    => '图片目录路径',
                                'process-in-queue'    => '在队列中处理',
                                'results'             => '结果',
                                'save-btn'            => '保存导入',
                                'settings'            => '设置',
                                'skip-errors'         => '跳过错误',
                                'stop-on-errors'      => '遇到错误时停止',
                                'title'               => '创建导入',
                                'type'                => '类型',
                                'validation-strategy' => '验证策略',
                                'upload_images'       => '上传图片（Zip）',
                            ],
                            'edit' => [
                                'action'              => '操作',
                                'allowed-errors'      => '允许的错误数',
                                'back-btn'            => '返回',
                                'create-update'       => '创建/更新',
                                'delete'              => '删除',
                                'download-sample'     => '下载示例',
                                'download-sample-zip' => '下载示例图片压缩包',
                                'field-separator'     => '字段分隔符',
                                'file-info-example'   => '例如，产品图片应放置在 /project-root/storage/app/import/product-images 文件夹中。',
                                'file-info'           => '使用相对于 /project-root/storage/app/import 的相对路径，例如 product-images, import-images。',
                                'file'                => '文件',
                                'general'             => '常规',
                                'images-directory'    => '图片目录路径',
                                'process-in-queue'    => '在队列中处理',
                                'results'             => '结果',
                                'save-btn'            => '保存导入',
                                'settings'            => '设置',
                                'skip-errors'         => '跳过错误',
                                'stop-on-errors'      => '遇到错误时停止',
                                'title'               => '编辑导入',
                                'type'                => '类型',
                                'validation-strategy' => '验证策略',
                            ],
                            'import' => [
                                'back-btn'                => '返回',
                                'completed-batches'       => '完成的批次总数：',
                                'download-error-report'   => '下载完整报告',
                                'edit-btn'                => '编辑',
                                'imported-info'           => '恭喜！您的导入成功。',
                                'importing-info'          => '导入处理中',
                                'indexing-info'           => '资源索引（价格、库存及Elastic Search）处理中',
                                'linking-info'            => '资源链接处理中',
                                'progress'                => '进度：',
                                'title'                   => '导入',
                                'total-batches'           => '批次总数：',
                                'total-created'           => '创建的记录总数：',
                                'total-deleted'           => '删除的记录总数：',
                                'total-errors'            => '错误总数：',
                                'total-invalid-rows'      => '无效行总数：',
                                'total-rows-processed'    => '处理的行总数：',
                                'total-updated'           => '更新的记录总数：',
                                'validate-info'           => '点击验证数据以检查您的导入。',
                                'validate'                => '验证',
                                'validating-info'         => '数据读取与验证已开始',
                                'validation-failed-info'  => '您的导入无效。请修正以下错误并重试。',
                                'validation-success-info' => '您的导入有效。点击导入以开始导入过程。',
                            ],
                            'create-success'    => '导入成功创建。',
                            'delete-failed'     => '导入删除失败。',
                            'delete-success'    => '导入已成功删除。',
                            'not-valid'         => '导入无效',
                            'nothing-to-import' => '没有可导入的资源。',
                            'setup-queue-error' => '请将您的队列驱动程序更改为 "database" 或 "redis" 以启动导入过程。',
                            'update-success'    => '导入已成功更新。',
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
                    'not-found'              => '找不到卖家。',
                    'profile-fields-missing' => '缺少卖家资料字段："%s"。'
                ],
            ],
        ],
        'categories' => [
            'validation' => [
                'errors' => [
                    'duplicate-slug'           => '分类别名：\'%s\'在导入文件中出现多次。',
                    'slug_not_found_to_delete' => '系统中未找到分类别名：\'%s\'。',
                    'invalid_display_mode'     => '显示模式：\'%s\'无效，必须是以下之一：products_and_description, products_only, description_only。',
                ],
            ],
        ],
    ],
];
