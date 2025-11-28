<?php

return [
'pl' => [
    'admin' => [
        'data-transfer' => [
            'index' => [
                'title' => 'Importy Rynku'
            ],
            'imports' => [
                'index' => [
                    'button-title' => 'Utwórz Import',
                    'back-btn'     => 'Wstecz'
                ],
                'products' => [
                    'title' => 'Produkty Sprzedawcy'
                ],
                'categories' => [
                    'title' => 'Kategorie'
                ],
                'seller' => [
                    'categories' => [
                        'title' => 'Kategorie Sprzedawcy'
                    ],
                ],
                'create' => [
                    'marketplace'   => 'Rynek',
                    'set_seller'    => 'Ustaw Sprzedawcę',
                    'select_seller' => 'Wybierz Sprzedawcę',
                    'upload_images' => 'Prześlij Obrazy (Zip)',
                ]
            ]
        ],
        'menu' => [
            'data-transfer' => 'Transfer Danych'
        ]
    ],
    'shop' => [
        'sellers' => [
            'account' => [
                'menu' => [
                    'seller-data-transfer' => 'Transfer Danych'
                ],
                'seller-data-transfer' => [
                    'index' => [
                        'title' => 'Transfer Danych',
                        'imports' => [
                            'index' => [
                                'button-title'      => 'Utwórz Import',
                                'save-button-title' => 'Zapisz Import',
                                'title'             => 'Importy',
                                'back-btn'          => 'Wstecz',
                                'datagrid' => [
                                    'import'        => 'Import',
                                    'edit'          => 'Edytuj',
                                    'delete'        => 'Usuń',
                                    'actions'       => 'Akcje',
                                    'completed-at'  => 'Zakończono',
                                    'created'       => 'Utworzono',
                                    'delete'        => 'Usuń',
                                    'deleted'       => 'Usunięto',
                                    'edit'          => 'Edytuj',
                                    'error-file'    => 'Plik z Błędami',
                                    'id'            => 'ID',
                                    'seller'        => 'Sprzedawca',
                                    'started-at'    => 'Rozpoczęto',
                                    'state'         => 'Stan',
                                    'summary'       => 'Podsumowanie',
                                    'updated'       => 'Zaktualizowano',
                                    'uploaded-file' => 'Przesłany Plik',
                                ],
                            ],
                            'create' => [
                                'action'              => 'Akcja',
                                'allowed-errors'      => 'Dozwolone Błędy',
                                'back-btn'            => 'Wstecz',
                                'create-update'       => 'Utwórz/Zaktualizuj',
                                'delete'              => 'Usuń',
                                'download-sample'     => 'Pobierz Przykład',
                                'download-sample-zip' => 'Pobierz Przykładowe Obrazy Zip',
                                'field-separator'     => 'Separator Pól',
                                'file-info-example'   => 'Na przykład, w przypadku obrazów produktów, pliki powinny być umieszczone w katalogu /project-root/storage/app/import/product-images.',
                                'file-info'           => 'Użyj ścieżki względnej do /project-root/storage/app/import, np. product-images, import-images.',
                                'file'                => 'Plik',
                                'general'             => 'Ogólny',
                                'images-directory'    => 'Ścieżka Katalogu Obrazów',
                                'process-in-queue'    => 'Przetwarzanie w Kolejce',
                                'results'             => 'Wyniki',
                                'save-btn'            => 'Zapisz Import',
                                'settings'            => 'Ustawienia',
                                'skip-errors'         => 'Pomiń Błędy',
                                'stop-on-errors'      => 'Zatrzymaj przy Błędach',
                                'title'               => 'Utwórz Import',
                                'type'                => 'Typ',
                                'validation-strategy' => 'Strategia Walidacji',
                                'upload_images'       => 'Prześlij Obrazy (Zip)',
                            ],
                            'edit' => [
                                'action'              => 'Akcja',
                                'allowed-errors'      => 'Dozwolone Błędy',
                                'back-btn'            => 'Wstecz',
                                'create-update'       => 'Utwórz/Zaktualizuj',
                                'delete'              => 'Usuń',
                                'download-sample'     => 'Pobierz Przykład',
                                'download-sample-zip' => 'Pobierz Przykładowe Obrazy Zip',
                                'field-separator'     => 'Separator Pól',
                                'file-info-example'   => 'Na przykład, w przypadku obrazów produktów, pliki powinny być umieszczone w katalogu /project-root/storage/app/import/product-images.',
                                'file-info'           => 'Użyj ścieżki względnej do /project-root/storage/app/import, np. product-images, import-images.',
                                'file'                => 'Plik',
                                'general'             => 'Ogólny',
                                'images-directory'    => 'Ścieżka Katalogu Obrazów',
                                'process-in-queue'    => 'Przetwarzanie w Kolejce',
                                'results'             => 'Wyniki',
                                'save-btn'            => 'Zapisz Import',
                                'settings'            => 'Ustawienia',
                                'skip-errors'         => 'Pomiń Błędy',
                                'stop-on-errors'      => 'Zatrzymaj przy Błędach',
                                'title'               => 'Edytuj Import',
                                'type'                => 'Typ',
                                'validation-strategy' => 'Strategia Walidacji',
                            ],
                            'import' => [
                                'back-btn'                => 'Wstecz',
                                'completed-batches'       => 'Łącznie Zakończonych Batchy:',
                                'download-error-report'   => 'Pobierz Pełny Raport',
                                'edit-btn'                => 'Edytuj',
                                'imported-info'           => 'Gratulacje! Twój import zakończył się sukcesem.',
                                'importing-info'          => 'Import w Trakcie',
                                'indexing-info'           => 'Indeksowanie Zasobów (Cena, Zapas i Elastic Search) W Trakcie',
                                'linking-info'            => 'Łączenie Zasobów W Trakcie',
                                'progress'                => 'Postęp:',
                                'title'                   => 'Import',
                                'total-batches'           => 'Łączna Ilość Batchy:',
                                'total-created'           => 'Łączna Ilość Utworzonych Rekordów:',
                                'total-deleted'           => 'Łączna Ilość Usuniętych Rekordów:',
                                'total-errors'            => 'Łączna Ilość Błędów:',
                                'total-invalid-rows'      => 'Łączna Ilość Nieprawidłowych Wierszy:',
                                'total-rows-processed'    => 'Łączna Ilość Przetworzonych Wierszy:',
                                'total-updated'           => 'Łączna Ilość Zaktualizowanych Rekordów:',
                                'validate-info'           => 'Kliknij Waliduj Dane, aby sprawdzić swój import.',
                                'validate'                => 'Waliduj',
                                'validating-info'         => 'Rozpoczęto czytanie i walidację danych',
                                'validation-failed-info'  => 'Twój import jest nieprawidłowy. Popraw następujące błędy i spróbuj ponownie.',
                                'validation-success-info' => 'Twój import jest prawidłowy. Kliknij Importuj, aby rozpocząć proces importu.',
                            ],
                            'create-success'    => 'Import został pomyślnie utworzony.',
                            'delete-failed'     => 'Usunięcie importu nie powiodło się.',
                            'delete-success'    => 'Import został pomyślnie usunięty.',
                            'not-valid'         => 'Import jest nieprawidłowy',
                            'nothing-to-import' => 'Nie ma zasobów do importu.',
                            'setup-queue-error' => 'Zmień sterownik kolejki na "database" lub "redis", aby rozpocząć proces importu.',
                            'update-success'    => 'Import został pomyślnie zaktualizowany.',
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
                    'not-found'              => 'Sprzedawca nie znaleziony.',
                    'profile-fields-missing' => 'Brakujące pola profilu sprzedawcy: "%s".'
                ],
            ],
        ],
        'categories' => [
            'validation' => [
                'errors' => [
                    'duplicate-slug'               => 'Slug kategorii',
                        'duplicate-slug'           => 'Slug kategorii: \'%s\' występuje więcej niż raz w pliku importu.',
                        'slug_not_found_to_delete' => 'Slug kategorii: \'%s\' nie znaleziony w systemie.',
                        'invalid_display_mode'     => 'Tryb wyświetlania: \'%s\' jest nieprawidłowy; musi być jednym z: products_and_description, products_only, description_only.',
                    ],
                ],
            ],
        ],
    ],

];
