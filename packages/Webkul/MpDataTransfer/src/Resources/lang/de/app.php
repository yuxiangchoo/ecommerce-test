<?php

return [
    'admin' => [
        'data-transfer' => [
            'index' => [
                'title' => 'Marktplatz Importe'
            ],
            'imports' => [
                'index' => [
                    'button-title' => 'Import Erstellen',
                    'back-btn'     => 'Zurück'
                ],
                'products' => [
                    'title' => 'Verkäuferprodukte'
                ],
                'categories' => [
                    'title' => 'Kategorien'
                ],
                'seller' => [
                    'categories' => [
                        'title' => 'Verkäuferkategorien'
                    ],
                ],
                'create' => [
                    'marketplace'   => 'Marktplatz',
                    'set_seller'    => 'Verkäufer Festlegen',
                    'select_seller' => 'Verkäufer Auswählen',
                    'upload_images' => 'Bilder Hochladen (Zip)',
                ]
            ]
        ],
        'menu' => [
            'data-transfer' => 'Datenübertragung'
        ]
    ],
    'shop' => [
        'sellers' => [
            'account' => [
                'menu' => [
                    'seller-data-transfer' => 'Datenübertragung'
                ],
                'seller-data-transfer' => [
                    'index' => [
                        'title' => 'Datenübertragung'
                    ],
                    'imports' => [
                        'index' => [
                            'button-title'      => 'Import Erstellen',
                            'save-button-title' => 'Import Speichern',
                            'title'             => 'Importe',
                            'back-btn'          => 'Zurück',
                            'datagrid' => [
                                'import'        => 'Importieren',
                                'edit'          => 'Bearbeiten',
                                'delete'        => 'Löschen',
                                'actions'       => 'Aktionen',
                                'completed-at'  => 'Abgeschlossen Am',
                                'created'       => 'Erstellt',
                                'deleted'       => 'Gelöscht',
                                'edit'          => 'Bearbeiten',
                                'error-file'    => 'Fehlerdatei',
                                'id'            => 'ID',
                                'seller'        => 'Verkäufer',
                                'started-at'    => 'Gestartet Am',
                                'state'         => 'Status',
                                'summary'       => 'Zusammenfassung',
                                'updated'       => 'Aktualisiert',
                                'uploaded-file' => 'Hochgeladene Datei',
                            ],
                        ],
                        'create' => [
                            'action'              => 'Aktion',
                            'allowed-errors'      => 'Erlaubte Fehler',
                            'back-btn'            => 'Zurück',
                            'create-update'       => 'Erstellen/Aktualisieren',
                            'delete'              => 'Löschen',
                            'download-sample'     => 'Beispiel Herunterladen',
                            'download-sample-zip' => 'Beispiel Bilder Zip Herunterladen',
                            'field-separator'     => 'Feld-Trennzeichen',
                            'file-info-example'   => 'Beispiel: Im Fall von Produktbildern sollten Dateien im Ordner /project-root/storage/app/import/product-images gespeichert werden.',
                            'file-info'           => 'Verwenden Sie den relativen Pfad zu /project-root/storage/app/import, z.B. product-images, import-images.',
                            'file'                => 'Datei',
                            'general'             => 'Allgemein',
                            'images-directory'    => 'Bildverzeichnis-Pfad',
                            'process-in-queue'    => 'In Warteschlange Verarbeiten',
                            'results'             => 'Ergebnisse',
                            'save-btn'            => 'Import Speichern',
                            'settings'            => 'Einstellungen',
                            'skip-errors'         => 'Fehler Überspringen',
                            'stop-on-errors'      => 'Bei Fehlern Anhalten',
                            'title'               => 'Import Erstellen',
                            'type'                => 'Typ',
                            'validation-strategy' => 'Validierungsstrategie',
                            'upload_images'       => 'Bilder Hochladen (Zip)',
                        ],
                        'edit' => [
                            'action'              => 'Aktion',
                            'allowed-errors'      => 'Erlaubte Fehler',
                            'back-btn'            => 'Zurück',
                            'create-update'       => 'Erstellen/Aktualisieren',
                            'delete'              => 'Löschen',
                            'download-sample'     => 'Beispiel Herunterladen',
                            'download-sample-zip' => 'Beispiel Bilder Zip Herunterladen',
                            'field-separator'     => 'Feld-Trennzeichen',
                            'file-info-example'   => 'Beispiel: Im Fall von Produktbildern sollten Dateien im Ordner /project-root/storage/app/import/product-images gespeichert werden.',
                            'file-info'           => 'Verwenden Sie den relativen Pfad zu /project-root/storage/app/import, z.B. product-images, import-images.',
                            'file'                => 'Datei',
                            'general'             => 'Allgemein',
                            'images-directory'    => 'Bildverzeichnis-Pfad',
                            'process-in-queue'    => 'In Warteschlange Verarbeiten',
                            'results'             => 'Ergebnisse',
                            'save-btn'            => 'Import Speichern',
                            'settings'            => 'Einstellungen',
                            'skip-errors'         => 'Fehler Überspringen',
                            'stop-on-errors'      => 'Bei Fehlern Anhalten',
                            'title'               => 'Import Bearbeiten',
                            'type'                => 'Typ',
                            'validation-strategy' => 'Validierungsstrategie',
                        ],
                        'import' => [
                            'back-btn'                => 'Zurück',
                            'completed-batches'       => 'Abgeschlossene Batches:',
                            'download-error-report'   => 'Kompletten Bericht Herunterladen',
                            'edit-btn'                => 'Bearbeiten',
                            'imported-info'           => 'Glückwunsch! Ihr Import war erfolgreich.',
                            'importing-info'          => 'Import Vorgang Läuft',
                            'indexing-info'           => 'Ressourcenindexierung (Preis, Bestand und Elasticsearch) läuft',
                            'linking-info'            => 'Ressourcenverknüpfung läuft',
                            'progress'                => 'Fortschritt:',
                            'title'                   => 'Import',
                            'total-batches'           => 'Gesamtbatches:',
                            'total-created'           => 'Gesamte Einträge Erstellt:',
                            'total-deleted'           => 'Gesamte Einträge Gelöscht:',
                            'total-errors'            => 'Gesamtfehler:',
                            'total-invalid-rows'      => 'Gesamte Ungültige Zeilen:',
                            'total-rows-processed'    => 'Gesamtbearbeitete Zeilen:',
                            'total-updated'           => 'Gesamte Einträge Aktualisiert:',
                            'validate-info'           => 'Klicken Sie auf "Daten Validieren", um Ihren Import zu prüfen.',
                            'validate'                => 'Validieren',
                            'validating-info'         => 'Datenlesung und Validierung gestartet',
                            'validation-failed-info'  => 'Ihr Import ist ungültig. Bitte beheben Sie die folgenden Fehler und versuchen Sie es erneut.',
                            'validation-success-info' => 'Ihr Import ist gültig. Klicken Sie auf "Importieren", um den Vorgang zu starten.',
                        ],
                        'create-success'    => 'Import erfolgreich erstellt.',
                        'delete-failed'     => 'Import konnte unerwartet nicht gelöscht werden.',
                        'delete-success'    => 'Import erfolgreich gelöscht.',
                        'not-valid'         => 'Import ist ungültig',
                        'nothing-to-import' => 'Es gibt keine Ressourcen zum Importieren.',
                        'setup-queue-error' => 'Bitte ändern Sie Ihren Warteschlangentreiber auf "Datenbank" oder "Redis", um den Importvorgang zu starten.',
                        'update-success'    => 'Import erfolgreich aktualisiert.',
                    ],
                ],
            ],
        ],
    ],
    'importers' => [
        'seller' => [
            'validation' => [
                'errors' => [
                    'not-found'              => 'Verkäufer nicht gefunden.',
                    'profile-fields-missing' => 'Verkäuferprofilfelder fehlen: "%s".'
                ],
            ],
        ],
        'categories' => [
            'validation' => [
                'errors' => [
                    'duplicate-slug'           => 'Kategorie-Slug: \'%s\' wurde mehr als einmal in der Importdatei gefunden.',
                    'slug_not_found_to_delete' => 'Kategorie-Slug: \'%s\' wurde im System nicht gefunden.',
                    'invalid_display_mode'     => 'Anzeigeart: \'%s\' ist ungültig, es muss eine der folgenden sein: products_and_description, products_only, description_only.',
                ],
            ],
        ],
    ],
];
