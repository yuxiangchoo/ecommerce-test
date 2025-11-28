<?php

return [
     'admin' => [
        'data-transfer' => [
            'index' => [
                'title' => 'Імпорт на Marketplace'
            ],
            'imports' => [
                'index' => [
                    'button-title' => 'Створити Імпорт',
                    'back-btn'     => 'Назад'
                ],
                'products' => [
                    'title' => 'Товари Продавця'
                ],
                'categories' => [
                    'title' => 'Категорії'
                ],
                'seller' => [
                    'categories' => [
                        'title' => 'Категорії Продавця'
                    ],
                ],
                'create' => [
                    'marketplace'   => 'Marketplace',
                    'set_seller'    => 'Встановити Продавця',
                    'select_seller' => 'Вибрати Продавця',
                    'upload_images' => 'Завантажити Зображення (Zip)',
                ]
            ]
        ],
        'menu' => [
            'data-transfer' => 'Передача Даних'
        ]
    ],
    'shop' => [
        'sellers' => [
            'account' => [
                'menu' => [
                    'seller-data-transfer' => 'Передача Даних'
                ],
                'seller-data-transfer' => [
                    'index' => [
                        'title' => 'Передача Даних',
                        'imports' => [
                            'index' => [
                                'button-title'      => 'Створити Імпорт',
                                'save-button-title' => 'Зберегти Імпорт',
                                'title'             => 'Імпорти',
                                'back-btn'          => 'Назад',
                                'datagrid' => [
                                    'import'        => 'Імпорт',
                                    'edit'          => 'Редагувати',
                                    'delete'        => 'Видалити',
                                    'actions'       => 'Дії',
                                    'completed-at'  => 'Завершено',
                                    'created'       => 'Створено',
                                    'delete'        => 'Видалити',
                                    'deleted'       => 'Видалено',
                                    'edit'          => 'Редагувати',
                                    'error-file'    => 'Файл з Помилкою',
                                    'id'            => 'ID',
                                    'seller'        => 'Продавець',
                                    'started-at'    => 'Початок',
                                    'state'         => 'Стан',
                                    'summary'       => 'Підсумок',
                                    'updated'       => 'Оновлено',
                                    'uploaded-file' => 'Завантажений Файл',
                                ],
                            ],
                            'create' => [
                                'action'              => 'Дія',
                                'allowed-errors'      => 'Допустимі Помилки',
                                'back-btn'            => 'Назад',
                                'create-update'       => 'Створити/Оновити',
                                'delete'              => 'Видалити',
                                'download-sample'     => 'Завантажити Зразок',
                                'download-sample-zip' => 'Завантажити Зразок Зображень Zip',
                                'field-separator'     => 'Роздільник Полів',
                                'file-info-example'   => 'Наприклад, файли із зображеннями товарів повинні бути у папці /project-root/storage/app/import/product-images.',
                                'file-info'           => 'Використовуйте відносний шлях до /project-root/storage/app/import, напр. product-images, import-images.',
                                'file'                => 'Файл',
                                'general'             => 'Загальні',
                                'images-directory'    => 'Шлях до Папки з Зображеннями',
                                'process-in-queue'    => 'Обробляти у Черзі',
                                'results'             => 'Результати',
                                'save-btn'            => 'Зберегти Імпорт',
                                'settings'            => 'Налаштування',
                                'skip-errors'         => 'Пропустити Помилки',
                                'stop-on-errors'      => 'Зупинити при Помилках',
                                'title'               => 'Створити Імпорт',
                                'type'                => 'Тип',
                                'validation-strategy' => 'Стратегія Валідації',
                                'upload_images'       => 'Завантажити Зображення (Zip)',
                            ],
                            'edit' => [
                                'action'              => 'Дія',
                                'allowed-errors'      => 'Допустимі Помилки',
                                'back-btn'            => 'Назад',
                                'create-update'       => 'Створити/Оновити',
                                'delete'              => 'Видалити',
                                'download-sample'     => 'Завантажити Зразок',
                                'download-sample-zip' => 'Завантажити Зразок Зображень Zip',
                                'field-separator'     => 'Роздільник Полів',
                                'file-info-example'   => 'Наприклад, файли із зображеннями товарів повинні бути у папці /project-root/storage/app/import/product-images.',
                                'file-info'           => 'Використовуйте відносний шлях до /project-root/storage/app/import, напр. product-images, import-images.',
                                'file'                => 'Файл',
                                'general'             => 'Загальні',
                                'images-directory'    => 'Шлях до Папки з Зображеннями',
                                'process-in-queue'    => 'Обробляти у Черзі',
                                'results'             => 'Результати',
                                'save-btn'            => 'Зберегти Імпорт',
                                'settings'            => 'Налаштування',
                                'skip-errors'         => 'Пропустити Помилки',
                                'stop-on-errors'      => 'Зупинити при Помилках',
                                'title'               => 'Редагувати Імпорт',
                                'type'                => 'Тип',
                                'validation-strategy' => 'Стратегія Валідації',
                            ],
                            'import' => [
                                'back-btn'                => 'Назад',
                                'completed-batches'       => 'Усього Завершених Партій:',
                                'download-error-report'   => 'Завантажити Повний Звіт',
                                'edit-btn'                => 'Редагувати',
                                'imported-info'           => 'Вітаємо! Ваш імпорт пройшов успішно.',
                                'importing-info'          => 'Процес Імпорту',
                                'indexing-info'           => 'Індексація Ресурсів (Ціна, Інвентар та Пошук) триває',
                                'linking-info'            => 'Посилання Ресурсів триває',
                                'progress'                => 'Прогрес:',
                                'title'                   => 'Імпорт',
                                'total-batches'           => 'Усього Партій:',
                                'total-created'           => 'Усього Створених Записів:',
                                'total-deleted'           => 'Усього Видалених Записів:',
                                'total-errors'            => 'Усього Помилок:',
                                'total-invalid-rows'      => 'Усього Некоректних Рядків:',
                                'total-rows-processed'    => 'Усього Оброблених Рядків:',
                                'total-updated'           => 'Усього Оновлених Записів:',
                                'validate-info'           => 'Натисніть "Перевірити Дані", щоб перевірити ваш імпорт.',
                                'validate'                => 'Перевірити',
                                'validating-info'         => 'Читання та Валідація Даних Розпочато',
                                'validation-failed-info'  => 'Ваш імпорт некоректний. Виправте наступні помилки та спробуйте ще раз.',
                                'validation-success-info' => 'Ваш імпорт коректний. Натисніть "Імпортувати", щоб розпочати процес імпорту.',
                            ],
                            'create-success'    => 'Імпорт успішно створено.',
                            'delete-failed'     => 'Помилка при видаленні імпорту.',
                            'delete-success'    => 'Імпорт успішно видалено.',
                            'not-valid'         => 'Імпорт некоректний',
                            'nothing-to-import' => 'Немає ресурсів для імпорту.',
                            'setup-queue-error' => 'Змініть драйвер черги на "database" або "redis" для запуску процесу імпорту.',
                            'update-success'    => 'Імпорт успішно оновлено.',
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
                    'not-found'              => 'Продавця не знайдено.',
                    'profile-fields-missing' => 'Відсутні поля профілю продавця: "%s".'
                ],
            ],
        ],
        'categories' => [
            'validation' => [
                'errors' => [
                    'duplicate-slug'           => 'Слаг категорії : \'%s\' знайдено більше одного разу у файлі імпорту.',
                    'slug_not_found_to_delete' => 'Слаг категорії : \'%s\' не знайдено в системі.',
                    'invalid_display_mode'     => 'Режим відображення : \'%s\' недійсний, він має бути одним із наступних: products_and_description, products_only, description_only.',
                ],
            ],
        ],
    ],
];
