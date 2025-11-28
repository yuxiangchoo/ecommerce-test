<?php

return [
    'nl' => [
        'admin' => [
            'data-transfer' => [
                'index' => [
                    'title' => 'Marktplaats Imports'
                ],
                'imports' => [
                    'index' => [
                        'button-title' => 'Import maken',
                        'back-btn'     => 'Terug'
                    ],
                    'products' => [
                        'title' => 'Verkoper Producten'
                    ],
                    'categories' => [
                        'title' => 'Categorieën'
                    ],
                    'seller' => [
                        'categories' => [
                            'title' => 'Verkoper Categorieën'
                        ],
                    ],
                    'create' => [
                        'marketplace'   => 'Marktplaats',
                        'set_seller'    => 'Verkoper Instellen',
                        'select_seller' => 'Verkoper Kiezen',
                        'upload_images' => 'Afbeeldingen Uploaden (Zip)',
                    ]
                ]
            ],
            'menu' => [
                'data-transfer' => 'Gegevensoverdracht'
            ]
        ],
        'shop' => [
            'sellers' => [
                'account' => [
                    'menu' => [
                        'seller-data-transfer' => 'Gegevensoverdracht'
                    ],
                    'seller-data-transfer' => [
                        'index' => [
                            'title' => 'Gegevensoverdracht',
                            'imports' => [
                                'index' => [
                                    'button-title'      => 'Import maken',
                                    'save-button-title' => 'Import Opslaan',
                                    'title'             => 'Imports',
                                    'back-btn'          => 'Terug',
                                    'datagrid' => [
                                        'import'        => 'Import',
                                        'edit'          => 'Bewerken',
                                        'delete'        => 'Verwijderen',
                                        'actions'       => 'Acties',
                                        'completed-at'  => 'Voltooid Op',
                                        'created'       => 'Gemaakt',
                                        'delete'        => 'Verwijderen',
                                        'deleted'       => 'Verwijderd',
                                        'edit'          => 'Bewerken',
                                        'error-file'    => 'Foutbestand',
                                        'id'            => 'ID',
                                        'seller'        => 'Verkoper',
                                        'started-at'    => 'Begonnen Op',
                                        'state'         => 'Status',
                                        'summary'       => 'Samenvatting',
                                        'updated'       => 'Bijgewerkt',
                                        'uploaded-file' => 'Geüpload Bestand',
                                    ],
                                ],
                                'create' => [
                                    'action'              => 'Actie',
                                    'allowed-errors'      => 'Toegestane Fouten',
                                    'back-btn'            => 'Terug',
                                    'create-update'       => 'Creëren/Bijwerken',
                                    'delete'              => 'Verwijderen',
                                    'download-sample'     => 'Voorbeeld Downloaden',
                                    'download-sample-zip' => 'Voorbeeld Afbeeldingen Zip Downloaden',
                                    'field-separator'     => 'Veldscheidingsteken',
                                    'file-info-example'   => 'Bijvoorbeeld, in het geval van product-afbeeldingen, moeten bestanden worden geplaatst in de /project-root/storage/app/import/product-images map.',
                                    'file-info'           => 'Gebruik relatieve paden naar /project-root/storage/app/import, bijv. product-afbeeldingen, import-afbeeldingen.',
                                    'file'                => 'Bestand',
                                    'general'             => 'Algemeen',
                                    'images-directory'    => 'Afbeeldingen Directory Pad',
                                    'process-in-queue'    => 'Verwerken In Wachtrij',
                                    'results'             => 'Resultaten',
                                    'save-btn'            => 'Import Opslaan',
                                    'settings'            => 'Instellingen',
                                    'skip-errors'         => 'Fouten Overslaan',
                                    'stop-on-errors'      => 'Stoppen bij Fouten',
                                    'title'               => 'Import Maken',
                                    'type'                => 'Type',
                                    'validation-strategy' => 'Validatiestrategie',
                                    'upload_images'       => 'Afbeeldingen Uploaden (Zip)',
                                ],
                                'edit' => [
                                    'action'              => 'Actie',
                                    'allowed-errors'      => 'Toegestane Fouten',
                                    'back-btn'            => 'Terug',
                                    'create-update'       => 'Creëren/Bijwerken',
                                    'delete'              => 'Verwijderen',
                                    'download-sample'     => 'Voorbeeld Downloaden',
                                    'download-sample-zip' => 'Voorbeeld Afbeeldingen Zip Downloaden',
                                    'field-separator'     => 'Veldscheidingsteken',
                                    'file-info-example'   => 'Bijvoorbeeld, in het geval van product-afbeeldingen, moeten bestanden worden geplaatst in de /project-root/storage/app/import/product-images map.',
                                    'file-info'           => 'Gebruik relatieve paden naar /project-root/storage/app/import, bijv. product-afbeeldingen, import-afbeeldingen.',
                                    'file'                => 'Bestand',
                                    'general'             => 'Algemeen',
                                    'images-directory'    => 'Afbeeldingen Directory Pad',
                                    'process-in-queue'    => 'Verwerken In Wachtrij',
                                    'results'             => 'Resultaten',
                                    'save-btn'            => 'Import Opslaan',
                                    'settings'            => 'Instellingen',
                                    'skip-errors'         => 'Fouten Overslaan',
                                    'stop-on-errors'      => 'Stoppen bij Fouten',
                                    'title'               => 'Import Bewerken',
                                    'type'                => 'Type',
                                    'validation-strategy' => 'Validatiestrategie',
                                ],
                                'import' => [
                                    'back-btn'                => 'Terug',
                                    'completed-batches'       => 'Totaal Voltooide Batches:',
                                    'download-error-report'   => 'Volledige Rapport Downloaden',
                                    'edit-btn'                => 'Bewerken',
                                    'imported-info'           => 'Gefeliciteerd! Uw import was succesvol.',
                                    'importing-info'          => 'Import In Proces',
                                    'indexing-info'           => 'Resources Indexeren (Prijs, Voorraad en Elastic Search) In Progress',
                                    'linking-info'            => 'Resources Koppelen In Progress',
                                    'progress'                => 'Voortgang:',
                                    'title'                   => 'Import',
                                    'total-batches'           => 'Totaal Batches:',
                                    'total-created'           => 'Totaal Records Gemaakt:',
                                    'total-deleted'           => 'Totaal Records Verwijderd:',
                                    'total-errors'            => 'Totaal Fouten:',
                                    'total-invalid-rows'      => 'Totaal Ongeldige Rijen:',
                                    'total-rows-processed'    => 'Totaal Verwerkte Rijen:',
                                    'total-updated'           => 'Totaal Records Bijgewerkt:',
                                    'validate-info'           => 'Klik op Valideer Gegevens om uw import te controleren.',
                                    'validate'                => 'Valideren',
                                    'validating-info'         => 'De gegevens zijn begonnen met lezen en valideren',
                                    'validation-failed-info'  => 'Uw import is ongeldig. Los de volgende fouten op en probeer het opnieuw.',
                                    'validation-success-info' => 'Uw import is geldig. Klik op Importeren om het importproces te starten.',
                                ],
                                'create-success'    => 'Import succesvol aangemaakt.',
                                'delete-failed'     => 'Verwijdering van import is onverwacht mislukt.',
                                'delete-success'    => 'Import succesvol verwijderd.',
                                'not-valid'         => 'Import is ongeldig',
                                'nothing-to-import' => 'Er zijn geen bronnen om te importeren.',
                                'setup-queue-error' => 'Verander uw wachtrijdriver in "database" of "redis" om het importproces te starten.',
                                'update-success'    => 'Import succesvol bijgewerkt.',
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
                        'not-found'              => 'Verkoper niet gevonden.',
                        'profile-fields-missing' => 'Verkoper profielvelden ontbreken: "%s".'
                    ],
                ],
            ],
            'categories' => [
                'validation' => [
                    'errors' => [
                        'duplicate-slug'           => 'Categorie Slug : \'%s\' komt meer dan eens voor in het importbestand.',
                        'slug_not_found_to_delete' => 'Categorie Slug : \'%s\' niet gevonden in het systeem.',
                        'invalid_display_mode'     => 'Weergave modus : \'%s\' is ongeldig, het moet een van deze zijn: products_and_description, products_only, description_only.',
                    ],
                ],
            ],
        ],
    ]
];
