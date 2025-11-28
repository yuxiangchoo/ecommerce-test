<?php

return [
    'admin' => [
        'data-transfer' => [
            'index' => [
                'title' => 'Importations du Marché'
            ],
            'imports' => [
                'index' => [
                    'button-title' => 'Créer Importation',
                    'back-btn'     => 'Retour'
                ],
                'products' => [
                    'title' => 'Produits du Vendeur'
                ],
                'categories' => [
                    'title' => 'Catégories'
                ],
                'seller' => [
                    'categories' => [
                        'title' => 'Catégories du Vendeur'
                    ],
                ],
                'create' => [
                    'marketplace'   => 'Marché',
                    'set_seller'    => 'Définir Vendeur',
                    'select_seller' => 'Sélectionner Vendeur',
                    'upload_images' => 'Télécharger Images (Zip)',
                ]
            ]
        ],
        'menu' => [
            'data-transfer' => 'Transfert de Données'
        ]
    ],
    'shop' => [
        'sellers' => [
            'account' => [
                'menu' => [
                    'seller-data-transfer' => 'Transfert de Données'
                ],
                'seller-data-transfer' => [
                    'index' => [
                        'title' => 'Transfert de Données'
                    ],
                    'imports' => [
                        'index' => [
                            'button-title'      => 'Créer Importation',
                            'save-button-title' => 'Enregistrer Importation',
                            'title'             => 'Importations',
                            'back-btn'          => 'Retour',
                            'datagrid' => [
                                'import'        => 'Importer',
                                'edit'          => 'Modifier',
                                'delete'        => 'Supprimer',
                                'actions'       => 'Actions',
                                'completed-at'  => 'Terminé À',
                                'created'       => 'Créé',
                                'deleted'       => 'Supprimé',
                                'error-file'    => 'Fichier d’Erreur',
                                'id'            => 'ID',
                                'seller'        => 'Vendeur',
                                'started-at'    => 'Commencé À',
                                'state'         => 'État',
                                'summary'       => 'Résumé',
                                'updated'       => 'Mis à Jour',
                                'uploaded-file' => 'Fichier Téléchargé',
                            ],
                        ],
                        'create' => [
                            'action'              => 'Action',
                            'allowed-errors'      => 'Erreurs Autorisées',
                            'back-btn'            => 'Retour',
                            'create-update'       => 'Créer/Mettre à Jour',
                            'delete'              => 'Supprimer',
                            'download-sample'     => 'Télécharger un Exemple',
                            'download-sample-zip' => 'Télécharger un Exemple d’Images Zip',
                            'field-separator'     => 'Séparateur de Champs',
                            'file-info-example'   => 'Par exemple, pour des images de produit, les fichiers doivent être placés dans /project-root/storage/app/import/product-images.',
                            'file-info'           => 'Utilisez le chemin relatif à /project-root/storage/app/import, par exemple product-images, import-images.',
                            'file'                => 'Fichier',
                            'general'             => 'Général',
                            'images-directory'    => 'Chemin du Répertoire d’Images',
                            'process-in-queue'    => 'Traitement en File d’Attente',
                            'results'             => 'Résultats',
                            'save-btn'            => 'Enregistrer Importation',
                            'settings'            => 'Paramètres',
                            'skip-errors'         => 'Ignorer les Erreurs',
                            'stop-on-errors'      => 'Arrêter sur Erreurs',
                            'title'               => 'Créer Importation',
                            'type'                => 'Type',
                            'validation-strategy' => 'Stratégie de Validation',
                            'upload_images'       => 'Télécharger Images (Zip)',
                        ],
                        'edit' => [
                            'action'              => 'Action',
                            'allowed-errors'      => 'Erreurs Autorisées',
                            'back-btn'            => 'Retour',
                            'create-update'       => 'Créer/Mettre à Jour',
                            'delete'              => 'Supprimer',
                            'download-sample'     => 'Télécharger un Exemple',
                            'download-sample-zip' => 'Télécharger un Exemple d’Images Zip',
                            'field-separator'     => 'Séparateur de Champs',
                            'file-info-example'   => 'Par exemple, pour des images de produit, les fichiers doivent être placés dans /project-root/storage/app/import/product-images.',
                            'file-info'           => 'Utilisez le chemin relatif à /project-root/storage/app/import, par exemple product-images, import-images.',
                            'file'                => 'Fichier',
                            'general'             => 'Général',
                            'images-directory'    => 'Chemin du Répertoire d’Images',
                            'process-in-queue'    => 'Traitement en File d’Attente',
                            'results'             => 'Résultats',
                            'save-btn'            => 'Enregistrer Importation',
                            'settings'            => 'Paramètres',
                            'skip-errors'         => 'Ignorer les Erreurs',
                            'stop-on-errors'      => 'Arrêter sur Erreurs',
                            'title'               => 'Modifier Importation',
                            'type'                => 'Type',
                            'validation-strategy' => 'Stratégie de Validation',
                        ],
                        'import' => [
                            'back-btn'                => 'Retour',
                            'completed-batches'       => 'Lots Complétés:',
                            'download-error-report'   => 'Télécharger le Rapport Complet',
                            'edit-btn'                => 'Modifier',
                            'imported-info'           => 'Félicitations! Votre importation a été réalisée avec succès.',
                            'importing-info'          => 'Importation en Cours',
                            'indexing-info'           => 'Indexation des Ressources (Prix, Inventaire et Recherche Élastique) en Cours',
                            'linking-info'            => 'Liens des Ressources en Cours',
                            'progress'                => 'Progression:',
                            'title'                   => 'Importation',
                            'total-batches'           => 'Total des Lots:',
                            'total-created'           => 'Total des Enregistrements Créés:',
                            'total-deleted'           => 'Total des Enregistrements Supprimés:',
                            'total-errors'            => 'Total des Erreurs:',
                            'total-invalid-rows'      => 'Total des Lignes Invalides:',
                            'total-rows-processed'    => 'Total des Lignes Traitées:',
                            'total-updated'           => 'Total des Enregistrements Mis à Jour:',
                            'validate-info'           => 'Cliquez sur Valider les Données pour vérifier votre importation.',
                            'validate'                => 'Valider',
                            'validating-info'         => 'Lecture et Validation des Données en Cours',
                            'validation-failed-info'  => 'Votre importation est invalide. Veuillez corriger les erreurs suivantes et réessayer.',
                            'validation-success-info' => 'Votre importation est valide. Cliquez sur Importer pour démarrer le processus d’importation.',
                        ],
                        'create-success'    => 'Importation créée avec succès.',
                        'delete-failed'     => 'La suppression de l’importation a échoué de manière inattendue.',
                        'delete-success'    => 'Importation supprimée avec succès.',
                        'not-valid'         => 'Importation invalide',
                        'nothing-to-import' => 'Aucune ressource à importer.',
                        'setup-queue-error' => 'Veuillez modifier votre pilote de file d’attente à "database" ou "redis" pour démarrer le processus d’importation.',
                        'update-success'    => 'Importation mise à jour avec succès.',
                    ],
                ],
            ],
        ],
    ],
    'importers' => [
        'seller' => [
            'validation' => [
                'errors' => [
                    'not-found'              => 'Vendeur introuvable.',
                    'profile-fields-missing' => 'Champs du profil vendeur manquants: "%s".'
                ],
            ],
        ],
        'categories' => [
            'validation' => [
                'errors' => [
                    'duplicate-slug'           => 'Slug de catégorie : \'%s\' trouvé plusieurs fois dans le fichier d’importation.',
                    'slug_not_found_to_delete' => 'Slug de catégorie : \'%s\' introuvable dans le système.',
                    'invalid_display_mode'     => 'Mode d’affichage : \'%s\' invalide. Il doit être l’un des suivants : products_and_description, products_only, description_only.',
                ],
            ],
        ],
    ],
];
