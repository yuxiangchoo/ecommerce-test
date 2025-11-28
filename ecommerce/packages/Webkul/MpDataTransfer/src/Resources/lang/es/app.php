<?php

return [
    'admin' => [
        'data-transfer' => [
            'index' => [
                'title' => 'Importaciones del Mercado'
            ],
            'imports' => [
                'index' => [
                    'button-title' => 'Crear Importación',
                    'back-btn'     => 'Atrás'
                ],
                'products' => [
                    'title' => 'Productos de Vendedores'
                ],
                'categories' => [
                    'title' => 'Categorías'
                ],
                'seller' => [
                    'categories' => [
                        'title' => 'Categorías del Vendedor'
                    ],
                ],
                'create' => [
                    'marketplace'   => 'Mercado',
                    'set_seller'    => 'Asignar Vendedor',
                    'select_seller' => 'Seleccionar Vendedor',
                    'upload_images' => 'Subir Imágenes (Zip)',
                ]
            ]
        ],
        'menu' => [
            'data-transfer' => 'Transferencia de Datos'
        ]
    ],
    'shop' => [
        'sellers' => [
            'account' => [
                'menu' => [
                    'seller-data-transfer' => 'Transferencia de Datos'
                ],
                'seller-data-transfer' => [
                    'index' => [
                        'title' => 'Transferencia de Datos'
                    ],
                    'imports' => [
                        'index' => [
                            'button-title'      => 'Crear Importación',
                            'save-button-title' => 'Guardar Importación',
                            'title'             => 'Importaciones',
                            'back-btn'          => 'Atrás',
                            'datagrid' => [
                                'import'        => 'Importar',
                                'edit'          => 'Editar',
                                'delete'        => 'Eliminar',
                                'actions'       => 'Acciones',
                                'completed-at'  => 'Completado En',
                                'created'       => 'Creado',
                                'deleted'       => 'Eliminado',
                                'edit'          => 'Editar',
                                'error-file'    => 'Archivo de Errores',
                                'id'            => 'ID',
                                'seller'        => 'Vendedor',
                                'started-at'    => 'Iniciado En',
                                'state'         => 'Estado',
                                'summary'       => 'Resumen',
                                'updated'       => 'Actualizado',
                                'uploaded-file' => 'Archivo Subido',
                            ],
                        ],
                        'create' => [
                            'action'              => 'Acción',
                            'allowed-errors'      => 'Errores Permitidos',
                            'back-btn'            => 'Atrás',
                            'create-update'       => 'Crear/Actualizar',
                            'delete'              => 'Eliminar',
                            'download-sample'     => 'Descargar Ejemplo',
                            'download-sample-zip' => 'Descargar Ejemplo de Imágenes Zip',
                            'field-separator'     => 'Separador de Campo',
                            'file-info-example'   => 'Por ejemplo, en el caso de imágenes de productos, los archivos deben colocarse en la carpeta /project-root/storage/app/import/product-images.',
                            'file-info'           => 'Usar la ruta relativa a /project-root/storage/app/import, ej. product-images, import-images.',
                            'file'                => 'Archivo',
                            'general'             => 'General',
                            'images-directory'    => 'Ruta del Directorio de Imágenes',
                            'process-in-queue'    => 'Procesar en Cola',
                            'results'             => 'Resultados',
                            'save-btn'            => 'Guardar Importación',
                            'settings'            => 'Configuración',
                            'skip-errors'         => 'Omitir Errores',
                            'stop-on-errors'      => 'Detener en Errores',
                            'title'               => 'Crear Importación',
                            'type'                => 'Tipo',
                            'validation-strategy' => 'Estrategia de Validación',
                            'upload_images'       => 'Subir Imágenes (Zip)',
                        ],
                        'edit' => [
                            'action'              => 'Acción',
                            'allowed-errors'      => 'Errores Permitidos',
                            'back-btn'            => 'Atrás',
                            'create-update'       => 'Crear/Actualizar',
                            'delete'              => 'Eliminar',
                            'download-sample'     => 'Descargar Ejemplo',
                            'download-sample-zip' => 'Descargar Ejemplo de Imágenes Zip',
                            'field-separator'     => 'Separador de Campo',
                            'file-info-example'   => 'Por ejemplo, en el caso de imágenes de productos, los archivos deben colocarse en la carpeta /project-root/storage/app/import/product-images.',
                            'file-info'           => 'Usar la ruta relativa a /project-root/storage/app/import, ej. product-images, import-images.',
                            'file'                => 'Archivo',
                            'general'             => 'General',
                            'images-directory'    => 'Ruta del Directorio de Imágenes',
                            'process-in-queue'    => 'Procesar en Cola',
                            'results'             => 'Resultados',
                            'save-btn'            => 'Guardar Importación',
                            'settings'            => 'Configuración',
                            'skip-errors'         => 'Omitir Errores',
                            'stop-on-errors'      => 'Detener en Errores',
                            'title'               => 'Editar Importación',
                            'type'                => 'Tipo',
                            'validation-strategy' => 'Estrategia de Validación',
                        ],
                        'import' => [
                            'back-btn'                => 'Atrás',
                            'completed-batches'       => 'Total de Lotes Completados:',
                            'download-error-report'   => 'Descargar Reporte Completo',
                            'edit-btn'                => 'Editar',
                            'imported-info'           => '¡Felicitaciones! Su importación fue exitosa.',
                            'importing-info'          => 'Importación en Proceso',
                            'indexing-info'           => 'Indexación de Recursos (Precio, Inventario y Búsqueda Elástica) en Proceso',
                            'linking-info'            => 'Enlazando Recursos en Proceso',
                            'progress'                => 'Progreso:',
                            'title'                   => 'Importación',
                            'total-batches'           => 'Total de Lotes:',
                            'total-created'           => 'Total de Registros Creados:',
                            'total-deleted'           => 'Total de Registros Eliminados:',
                            'total-errors'            => 'Total de Errores:',
                            'total-invalid-rows'      => 'Total de Filas Inválidas:',
                            'total-rows-processed'    => 'Total de Filas Procesadas:',
                            'total-updated'           => 'Total de Registros Actualizados:',
                            'validate-info'           => 'Haga clic en Validar Datos para revisar su importación.',
                            'validate'                => 'Validar',
                            'validating-info'         => 'Lectura y validación de datos iniciada',
                            'validation-failed-info'  => 'Su importación es inválida. Por favor, corrija los siguientes errores e intente nuevamente.',
                            'validation-success-info' => 'Su importación es válida. Haga clic en Importar para iniciar el proceso de importación.',
                        ],
                        'create-success'    => 'Importación creada con éxito.',
                        'delete-failed'     => 'La eliminación de la importación falló inesperadamente.',
                        'delete-success'    => 'Importación eliminada con éxito.',
                        'not-valid'         => 'La importación es inválida',
                        'nothing-to-import' => 'No hay recursos para importar.',
                        'setup-queue-error' => 'Por favor, cambie su controlador de cola a "database" o "redis" para iniciar el proceso de importación.',
                        'update-success'    => 'Importación actualizada con éxito.',
                    ],
                ],
            ],
        ],
    ],
    'importers' => [
        'seller' => [
            'validation' => [
                'errors' => [
                    'not-found'              => 'Vendedor no encontrado.',
                    'profile-fields-missing' => 'Campos de perfil del vendedor faltantes: "%s".'
                ],
            ],
        ],
        'categories' => [
            'validation' => [
                'errors' => [
                    'duplicate-slug'           => 'Slug de categoría: \'%s\' se encuentra más de una vez en el archivo de importación.',
                    'slug_not_found_to_delete' => 'Slug de categoría: \'%s\' no encontrado en el sistema.',
                    'invalid_display_mode'     => 'Modo de visualización: \'%s\' es inválido. Debe ser uno de los siguientes: products_and_description, products_only, description_only.',
                ],
            ],
        ],
    ],
];
