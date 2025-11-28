<?php

return [
    'admin' => [
        'data-transfer' => [
            'index' => [
                'title' => 'Importazioni Marketplace'
            ],
            'imports' => [
                'index' => [
                    'button-title' => 'Crea Importazione',
                    'back-btn'     => 'Indietro'
                ],
                'products' => [
                    'title' => 'Prodotti del Venditore'
                ],
                'categories' => [
                    'title' => 'Categorie'
                ],
                'seller' => [
                    'categories' => [
                        'title' => 'Categorie del Venditore'
                    ],
                ],
                'create' => [
                    'marketplace'   => 'Marketplace',
                    'set_seller'    => 'Imposta Venditore',
                    'select_seller' => 'Seleziona Venditore',
                    'upload_images' => 'Carica Immagini (Zip)',
                ]
            ]
        ],
        'menu' => [
            'data-transfer' => 'Trasferimento Dati'
        ]
    ],
    'shop' => [
        'sellers' => [
            'account' => [
                'menu' => [
                    'seller-data-transfer' => 'Trasferimento Dati'
                ],
                'seller-data-transfer' => [
                    'index' => [
                        'title' => 'Trasferimento Dati'
                    ],
                    'imports' => [
                        'index' => [
                            'button-title'      => 'Crea Importazione',
                            'save-button-title' => 'Salva Importazione',
                            'title'             => 'Importazioni',
                            'back-btn'          => 'Indietro',
                            'datagrid' => [
                                'import'        => 'Importa',
                                'edit'          => 'Modifica',
                                'delete'        => 'Elimina',
                                'actions'       => 'Azioni',
                                'completed-at'  => 'Completato il',
                                'created'       => 'Creato',
                                'delete'        => 'Elimina',
                                'deleted'       => 'Eliminato',
                                'edit'          => 'Modifica',
                                'error-file'    => 'File di Errore',
                                'id'            => 'ID',
                                'seller'        => 'Venditore',
                                'started-at'    => 'Iniziato il',
                                'state'         => 'Stato',
                                'summary'       => 'Riepilogo',
                                'updated'       => 'Aggiornato',
                                'uploaded-file' => 'File Caricato',
                            ],
                        ],
                        'create' => [
                            'action'              => 'Azione',
                            'allowed-errors'      => 'Errori Consentiti',
                            'back-btn'            => 'Indietro',
                            'create-update'       => 'Crea/Aggiorna',
                            'delete'              => 'Elimina',
                            'download-sample'     => 'Scarica Campione',
                            'download-sample-zip' => 'Scarica Campione Immagini Zip',
                            'field-separator'     => 'Separatore di Campo',
                            'file-info-example'   => 'Ad esempio, nel caso delle immagini prodotto, i file devono essere posizionati nella cartella /project-root/storage/app/import/product-images.',
                            'file-info'           => 'Usa il percorso relativo a /project-root/storage/app/import, es. product-images, import-images.',
                            'file'                => 'File',
                            'general'             => 'Generale',
                            'images-directory'    => 'Percorso Directory Immagini',
                            'process-in-queue'    => 'Elaborazione in Coda',
                            'results'             => 'Risultati',
                            'save-btn'            => 'Salva Importazione',
                            'settings'            => 'Impostazioni',
                            'skip-errors'         => 'Salta Errori',
                            'stop-on-errors'      => 'Fermati sugli Errori',
                            'title'               => 'Crea Importazione',
                            'type'                => 'Tipo',
                            'validation-strategy' => 'Strategia di Validazione',
                            'upload_images'       => 'Carica Immagini (Zip)',
                        ],
                        'edit' => [
                            'action'              => 'Azione',
                            'allowed-errors'      => 'Errori Consentiti',
                            'back-btn'            => 'Indietro',
                            'create-update'       => 'Crea/Aggiorna',
                            'delete'              => 'Elimina',
                            'download-sample'     => 'Scarica Campione',
                            'download-sample-zip' => 'Scarica Campione Immagini Zip',
                            'field-separator'     => 'Separatore di Campo',
                            'file-info-example'   => 'Ad esempio, nel caso delle immagini prodotto, i file devono essere posizionati nella cartella /project-root/storage/app/import/product-images.',
                            'file-info'           => 'Usa il percorso relativo a /project-root/storage/app/import, es. product-images, import-images.',
                            'file'                => 'File',
                            'general'             => 'Generale',
                            'images-directory'    => 'Percorso Directory Immagini',
                            'process-in-queue'    => 'Elaborazione in Coda',
                            'results'             => 'Risultati',
                            'save-btn'            => 'Salva Importazione',
                            'settings'            => 'Impostazioni',
                            'skip-errors'         => 'Salta Errori',
                            'stop-on-errors'      => 'Fermati sugli Errori',
                            'title'               => 'Modifica Importazione',
                            'type'                => 'Tipo',
                            'validation-strategy' => 'Strategia di Validazione',
                        ],
                        'import' => [
                            'back-btn'                => 'Indietro',
                            'completed-batches'       => 'Totale Batch Completati:',
                            'download-error-report'   => 'Scarica Report Completo',
                            'edit-btn'                => 'Modifica',
                            'imported-info'           => 'Congratulazioni! La tua importazione è stata completata con successo.',
                            'importing-info'          => 'Importazione in Corso',
                            'indexing-info'           => 'Indicizzazione Risorse (Prezzo, Inventario e Elastic Search) In Corso',
                            'linking-info'            => 'Collegamento Risorse in Corso',
                            'progress'                => 'Progresso:',
                            'title'                   => 'Importa',
                            'total-batches'           => 'Totale Batch:',
                            'total-created'           => 'Totali Record Creati:',
                            'total-deleted'           => 'Totali Record Eliminati:',
                            'total-errors'            => 'Totali Errori:',
                            'total-invalid-rows'      => 'Totali Righe Non Valide:',
                            'total-rows-processed'    => 'Totali Righe Elaborate:',
                            'total-updated'           => 'Totali Record Aggiornati:',
                            'validate-info'           => 'Clicca su Verifica Dati per controllare la tua importazione.',
                            'validate'                => 'Verifica',
                            'validating-info'         => 'I dati sono stati letti e la verifica è iniziata',
                            'validation-failed-info'  => 'La tua importazione non è valida. Per favore, correggi i seguenti errori e riprova.',
                            'validation-success-info' => 'La tua importazione è valida. Clicca su Importa per avviare il processo di importazione.',
                        ],
                        'create-success'    => 'Importazione creata con successo.',
                        'delete-failed'     => 'Eliminazione importazione fallita in modo imprevisto.',
                        'delete-success'    => 'Importazione eliminata con successo.',
                        'not-valid'         => 'L\'importazione non è valida',
                        'nothing-to-import' => 'Non ci sono risorse da importare.',
                        'setup-queue-error' => 'Per favore, cambia il tuo driver di coda in "database" o "redis" per avviare il processo di importazione.',
                        'update-success'    => 'Importazione aggiornata con successo.',
                    ],
                ],
            ],
        ],
    ],
    'importers' => [
        'seller' => [
            'validation' => [
                'errors' => [
                    'not-found'              => 'Venditore non trovato.',
                    'profile-fields-missing' => 'Campi profilo venditore mancanti: "%s".'
                ],
            ],
        ],
        'categories' => [
            'validation' => [
                'errors' => [
                    'duplicate-slug'           => 'Slug Categoria: \'%s\' trovato più di una volta nel file di importazione.',
                    'slug_not_found_to_delete' => 'Slug Categoria: \'%s\' non trovato nel sistema.',
                    'invalid_display_mode'     => 'Modalità di Visualizzazione: \'%s\' non valida, deve essere uno di questi: products_and_description, products_only, description_only.',
                ],
            ],
        ],
    ],
];