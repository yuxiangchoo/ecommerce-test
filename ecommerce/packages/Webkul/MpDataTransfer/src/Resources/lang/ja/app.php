<?php

return [
    'admin' => [
        'data-transfer' => [
            'index' => [
                'title' => 'マーケットプレイスのインポート'
            ],
            'imports' => [
                'index' => [
                    'button-title' => 'インポートを作成',
                    'back-btn'     => '戻る'
                ],
                'products' => [
                    'title' => '出品者の製品'
                ],
                'categories' => [
                    'title' => 'カテゴリ'
                ],
                'seller' => [
                    'categories' => [
                        'title' => '出品者のカテゴリ'
                    ],
                ],
                'create' => [
                    'marketplace'   => 'マーケットプレイス',
                    'set_seller'    => '出品者を設定',
                    'select_seller' => '出品者を選択',
                    'upload_images' => '画像をアップロード（Zip）',
                ]
            ]
        ],
        'menu' => [
            'data-transfer' => 'データ転送'
        ]
    ],
    'shop' => [
        'sellers' => [
            'account' => [
                'menu' => [
                    'seller-data-transfer' => 'データ転送'
                ],
                'seller-data-transfer' => [
                    'index' => [
                        'title' => 'データ転送'
                    ],
                    'imports' => [
                        'index' => [
                            'button-title'      => 'インポートを作成',
                            'save-button-title' => 'インポートを保存',
                            'title'             => 'インポート',
                            'back-btn'          => '戻る',
                            'datagrid' => [
                                'import'        => 'インポート',
                                'edit'          => '編集',
                                'delete'        => '削除',
                                'actions'       => 'アクション',
                                'completed-at'  => '完了日時',
                                'created'       => '作成日時',
                                'delete'        => '削除',
                                'deleted'       => '削除済み',
                                'edit'          => '編集',
                                'error-file'    => 'エラーファイル',
                                'id'            => 'ID',
                                'seller'        => '出品者',
                                'started-at'    => '開始日時',
                                'state'         => '状態',
                                'summary'       => 'サマリー',
                                'updated'       => '更新日時',
                                'uploaded-file' => 'アップロードされたファイル',
                            ],
                        ],
                        'create' => [
                            'action'              => 'アクション',
                            'allowed-errors'      => '許可されるエラー',
                            'back-btn'            => '戻る',
                            'create-update'       => '作成/更新',
                            'delete'              => '削除',
                            'download-sample'     => 'サンプルをダウンロード',
                            'download-sample-zip' => 'サンプル画像のZipをダウンロード',
                            'field-separator'     => 'フィールド区切り',
                            'file-info-example'   => '例えば、商品画像の場合、ファイルは /project-root/storage/app/import/product-images フォルダに配置する必要があります。',
                            'file-info'           => '相対パスを使用して /project-root/storage/app/import に、例： product-images, import-images。',
                            'file'                => 'ファイル',
                            'general'             => '一般',
                            'images-directory'    => '画像ディレクトリパス',
                            'process-in-queue'    => 'キュー内で処理中',
                            'results'             => '結果',
                            'save-btn'            => 'インポートを保存',
                            'settings'            => '設定',
                            'skip-errors'         => 'エラーをスキップ',
                            'stop-on-errors'      => 'エラーで停止',
                            'title'               => 'インポートを作成',
                            'type'                => 'タイプ',
                            'validation-strategy' => 'バリデーション戦略',
                            'upload_images'       => '画像をアップロード（Zip）',
                        ],
                        'edit' => [
                            'action'              => 'アクション',
                            'allowed-errors'      => '許可されるエラー',
                            'back-btn'            => '戻る',
                            'create-update'       => '作成/更新',
                            'delete'              => '削除',
                            'download-sample'     => 'サンプルをダウンロード',
                            'download-sample-zip' => 'サンプル画像のZipをダウンロード',
                            'field-separator'     => 'フィールド区切り',
                            'file-info-example'   => '例えば、商品画像の場合、ファイルは /project-root/storage/app/import/product-images フォルダに配置する必要があります。',
                            'file-info'           => '相対パスを使用して /project-root/storage/app/import に、例： product-images, import-images。',
                            'file'                => 'ファイル',
                            'general'             => '一般',
                            'images-directory'    => '画像ディレクトリパス',
                            'process-in-queue'    => 'キュー内で処理中',
                            'results'             => '結果',
                            'save-btn'            => 'インポートを保存',
                            'settings'            => '設定',
                            'skip-errors'         => 'エラーをスキップ',
                            'stop-on-errors'      => 'エラーで停止',
                            'title'               => 'インポートを編集',
                            'type'                => 'タイプ',
                            'validation-strategy' => 'バリデーション戦略',
                        ],
                        'import' => [
                            'back-btn'                => '戻る',
                            'completed-batches'       => '完了したバッチの合計:',
                            'download-error-report'   => '完全なレポートをダウンロード',
                            'edit-btn'                => '編集',
                            'imported-info'           => 'おめでとうございます！インポートは成功しました。',
                            'importing-info'          => 'インポート処理中',
                            'indexing-info'           => 'リソースのインデックス作成（価格、在庫、Elastic Search）が進行中',
                            'linking-info'            => 'リソースのリンク作成が進行中',
                            'progress'                => '進捗:',
                            'title'                   => 'インポート',
                            'total-batches'           => '合計バッチ:',
                            'total-created'           => '作成されたレコードの合計:',
                            'total-deleted'           => '削除されたレコードの合計:',
                            'total-errors'            => 'エラーの合計:',
                            'total-invalid-rows'      => '無効な行の合計:',
                            'total-rows-processed'    => '処理された行の合計:',
                            'total-updated'           => '更新されたレコードの合計:',
                            'validate-info'           => 'インポートをチェックするには、データを検証をクリックしてください。',
                            'validate'                => '検証',
                            'validating-info'         => 'データの読み取りと検証が開始されました',
                            'validation-failed-info'  => 'インポートが無効です。以下のエラーを修正し、再試行してください。',
                            'validation-success-info' => 'インポートが有効です。インポートを開始するには、インポートをクリックしてください。',
                        ],
                        'create-success'    => 'インポートが正常に作成されました。',
                        'delete-failed'     => 'インポートの削除に失敗しました。',
                        'delete-success'    => 'インポートが正常に削除されました。',
                        'not-valid'         => 'インポートは無効です',
                        'nothing-to-import' => 'インポートするリソースがありません。',
                        'setup-queue-error' => 'インポート処理を開始するには、キュードライバを「database」または「redis」に変更してください。',
                        'update-success'    => 'インポートが正常に更新されました。',
                    ],
                ],
            ],
        ],
    ],
    'importers' => [
        'seller' => [
            'validation' => [
                'errors' => [
                    'not-found'              => '出品者が見つかりません。',
                    'profile-fields-missing' => '出品者プロファイルのフィールドが不足しています: "%s".'
                ],
            ],
        ],
        'categories' => [
            'validation' => [
                'errors' => [
                    'duplicate-slug'           => 'カテゴリスラッグ: \'%s\' がインポートファイル内に複数回見つかりました。',
                    'slug_not_found_to_delete' => 'カテゴリスラッグ: \'%s\' がシステム内に見つかりません。',
                    'invalid_display_mode'     => '表示モード: \'%s\' が無効です。有効なものは次のとおりです: products_and_description, products_only, description_only。',
                ],
            ],
        ],
    ],
];
