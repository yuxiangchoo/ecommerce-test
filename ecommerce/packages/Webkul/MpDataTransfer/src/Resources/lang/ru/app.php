<?php

return [
    'admin' => [
        'data-transfer' => [
            'index' => [
                'title' => 'Импорт с торговой площадки'
            ],
            'imports' => [
                'index' => [
                    'button-title' => 'Создать Импорт',
                    'back-btn'     => 'Назад'
                ],
                'products' => [
                    'title' => 'Продукты Продавца'
                ],
                'categories' => [
                    'title'  => 'Категории',
                ],
                'seller' => [
                    'categories' => [
                        'title'  => 'Категории Продавца'
                    ],  
                ],
                'create' => [
                    'marketplace'   => 'Торговая площадка',
                    'set_seller'    => 'Установить Продавца',
                    'select_seller' => 'Выбрать Продавца',
                    'upload_images' => 'Загрузить Изображения (Zip)',
                ],
            ],
        ],
        'menu' => [
            'data-transfer' => 'Передача Данных',
        ],
    ],
    'shop' => [
        'sellers' => [
            'account' => [
                'menu' => [
                    'seller-data-transfer' => 'Передача Данных',
                ],
                'seller-data-transfer' => [
                    'index' => [
                        'title' => 'Передача Данных',
                    ],
                    'imports' => [
                        'index' => [
                            'button-title'      => 'Создать Импорт',
                            'save-button-title' => 'Сохранить Импорт',
                            'title'             => 'Импорты',
                            'back-btn'          => 'Назад',
                            'datagrid' => [
                                'import'        => 'Импорт',
                                'edit'          => 'Редактировать',
                                'delete'        => 'Удалить',
                                'actions'       => 'Действия',
                                'completed-at'  => 'Завершено В',
                                'created'       => 'Создано',
                                'delete'        => 'Удалить',
                                'deleted'       => 'Удалено',
                                'edit'          => 'Редактировать',
                                'error-file'    => 'Файл Ошибок',
                                'id'            => 'ID',
                                'seller'        => 'продавец',
                                'started-at'    => 'Начато В',
                                'state'         => 'Состояние',
                                'summary'       => 'Сводка',
                                'updated'       => 'Обновлено',
                                'uploaded-file' => 'Загруженный Файл',
                            ],
                        ],
                        'create' => [
                            'action'              => 'Действие',
                            'allowed-errors'      => 'Допустимые Ошибки',
                            'back-btn'            => 'Назад',
                            'create-update'       => 'Создать/Обновить',
                            'delete'              => 'Удалить',
                            'download-sample'     => 'Скачать Образец',
                            'download-sample-zip' => 'Скачать Образец Изображений (Zip)',
                            'field-separator'     => 'Разделитель Полей',
                            'file-info-example'   => 'Например, в случае изображений продуктов, файлы должны быть размещены в /project-root/storage/app/import/product-images.',
                            'file-info'           => 'Используйте относительный путь к /project-root/storage/app/import, например product-images, import-images.',
                            'file'                => 'Файл',
                            'general'             => 'Общее',
                            'images-directory'    => 'Путь к Каталогу Изображений',
                            'process-in-queue'    => 'Обрабатывать в Очереди',
                            'results'             => 'Результаты',
                            'save-btn'            => 'Сохранить Импорт',
                            'settings'            => 'Настройки',
                            'skip-errors'         => 'Пропускать Ошибки',
                            'stop-on-errors'      => 'Остановиться на Ошибках',
                            'title'               => 'Создать Импорт',
                            'type'                => 'Тип',
                            'validation-strategy' => 'Стратегия Валидации',
                            'upload_images'       => 'Загрузить Изображения (Zip)',
                        ],
                        'edit' => [
                            'action'              => 'Действие',
                            'allowed-errors'      => 'Допустимые Ошибки',
                            'back-btn'            => 'Назад',
                            'create-update'       => 'Создать/Обновить',
                            'delete'              => 'Удалить',
                            'download-sample'     => 'Скачать Образец',
                            'download-sample-zip' => 'Скачать Образец Изображений (Zip)',
                            'field-separator'     => 'Разделитель Полей',
                            'file-info-example'   => 'Например, в случае изображений продуктов, файлы должны быть размещены в /project-root/storage/app/import/product-images.',
                            'file-info'           => 'Используйте относительный путь к /project-root/storage/app/import, например product-images, import-images.',
                            'file'                => 'Файл',
                            'general'             => 'Общее',
                            'images-directory'    => 'Путь к Каталогу Изображений',
                            'process-in-queue'    => 'Обрабатывать в Очереди',
                            'results'             => 'Результаты',
                            'save-btn'            => 'Сохранить Импорт',
                            'settings'            => 'Настройки',
                            'skip-errors'         => 'Пропускать Ошибки',
                            'stop-on-errors'      => 'Остановиться на Ошибках',
                            'title'               => 'Редактировать Импорт',
                            'type'                => 'Тип',
                            'validation-strategy' => 'Стратегия Валидации',
                        ],                        
                        'import' => [
                            'back-btn'                => 'Назад',
                            'completed-batches'       => 'Всего Завершенных Пакетов:',
                            'download-error-report'   => 'Скачать Полный Отчет',
                            'edit-btn'                => 'Редактировать',
                            'imported-info'           => 'Поздравляем! Ваш импорт прошел успешно.',
                            'importing-info'          => 'Процесс Импорта',
                            'indexing-info'           => 'Индексация Ресурсов (Цена, Запасы и Поиск по Elastic) в Процессе',
                            'linking-info'            => 'Связывание Ресурсов в Процессе',
                            'progress'                => 'Прогресс:',
                            'title'                   => 'Импорт',
                            'total-batches'           => 'Всего Пакетов:',
                            'total-created'           => 'Всего Созданных Записей:',
                            'total-deleted'           => 'Всего Удаленных Записей:',
                            'total-errors'            => 'Всего Ошибок:',
                            'total-invalid-rows'      => 'Всего Неверных Строк:',
                            'total-rows-processed'    => 'Всего Обработанных Строк:',
                            'total-updated'           => 'Всего Обновленных Записей:',
                            'validate-info'           => 'Нажмите на "Проверить Данные", чтобы проверить ваш импорт.',
                            'validate'                => 'Проверить',
                            'validating-info'         => 'Началась проверка данных',
                            'validation-failed-info'  => 'Ваш импорт недействителен. Исправьте следующие ошибки и попробуйте снова.',
                            'validation-success-info' => 'Ваш импорт действителен. Нажмите "Импортировать", чтобы начать процесс импорта.',
                        ],
                        'create-success'    => 'Импорт успешно создан.',
                        'delete-failed'     => 'Не удалось удалить импорт.',
                        'delete-success'    => 'Импорт успешно удален.',
                        'not-valid'         => 'Импорт недействителен',
                        'nothing-to-import' => 'Нет ресурсов для импорта.',
                        'setup-queue-error' => 'Пожалуйста, измените ваш драйвер очереди на "database" или "redis", чтобы начать процесс импорта.',
                        'update-success'    => 'Импорт успешно обновлен.',
                    ],
                ],
            ],
        ],
    ],
    'importers' => [
        'seller' => [
            'validation' => [
                'errors' => [
                    'not-found'              => 'Продавец не найден.',
                    'profile-fields-missing' => 'Отсутствуют поля профиля продавца: "%s".'
                ],
            ],
        ],
        'categories' => [
            'validation' => [
                'errors' => [
                    'duplicate-slug'           => 'Слаг Категории: \'%s\' найден более одного раза в файле импорта.',
                    'slug_not_found_to_delete' => 'Слаг Категории: \'%s\' не найден в системе.',
                ],
            ],
        ],
    ],
];

