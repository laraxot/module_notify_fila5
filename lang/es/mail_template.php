<?php

declare(strict_types=1);

return [
    'navigation' => [
        'group' => [
            'name' => 'Notificaciones',
<<<<<<< HEAD
            'description' => 'Gestión de notificaciones por correo electrónico y sus plantillas'],
=======
            'description' => 'Gestión de notificaciones por correo electrónico y sus plantillas',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'label' => 'Plantillas de Email',
        'plural' => 'Plantillas de Email',
        'singular' => 'Plantilla de Email',
        'icon' => 'heroicon-o-envelope',
        'sort' => '1',
<<<<<<< HEAD
        'name' => 'Plantilla de Email'],
=======
        'name' => 'Plantilla de Email',
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'fields' => [
        'id' => [
            'label' => 'ID',
            'helper_text' => 'Identificador único de la plantilla',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'mailable' => [
            'label' => 'Clase Mailable',
            'placeholder' => 'Ingrese el nombre de la clase Mailable',
            'help' => 'La clase PHP que maneja el envío de correos electrónicos',
            'helper_text' => 'Clase PHP que gestiona el envío de correos electrónicos',
            'description' => 'mailable',
<<<<<<< HEAD
            'tooltip' => ''],
=======
            'tooltip' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'subject' => [
            'label' => 'Asunto',
            'placeholder' => 'Ingrese el asunto del correo electrónico',
            'help' => 'El asunto que aparecerá en el correo electrónico',
            'helper_text' => 'Asunto del correo electrónico',
            'description' => 'subject',
<<<<<<< HEAD
            'tooltip' => ''],
=======
            'tooltip' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'html_template' => [
            'label' => 'Contenido HTML',
            'placeholder' => 'Ingrese el contenido HTML del correo electrónico',
            'help' => 'El contenido del correo electrónico en formato HTML',
            'helper_text' => 'Contenido HTML de la plantilla de correo electrónico',
            'description' => 'html_template',
<<<<<<< HEAD
            'tooltip' => ''],
=======
            'tooltip' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'text_template' => [
            'label' => 'Contenido de Texto',
            'placeholder' => 'Ingrese el contenido de texto del correo electrónico',
            'help' => 'Versión de texto del correo electrónico para clientes que no admiten HTML',
            'helper_text' => 'Versión de texto de la plantilla de correo electrónico',
            'description' => 'text_template',
<<<<<<< HEAD
            'tooltip' => ''],
=======
            'tooltip' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'version' => [
            'label' => 'Versión',
            'help' => 'Número de versión de la plantilla',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'created_at' => [
            'label' => 'Creado el',
            'helper_text' => 'Fecha de creación de la plantilla',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'updated_at' => [
            'label' => 'Última Modificación',
            'helper_text' => 'Fecha de la última modificación de la plantilla',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'from_email' => [
            'label' => 'Email del remitente',
            'helper_text' => 'Dirección de correo electrónico del remitente',
            'placeholder' => 'noreply@ejemplo.com',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'from_name' => [
            'label' => 'Nombre del remitente',
            'helper_text' => 'Nombre mostrado del remitente',
            'placeholder' => 'Nombre de la Empresa',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'variables' => [
            'label' => 'Variables disponibles',
            'helper_text' => 'Lista de variables que se pueden utilizar en la plantilla',
            'placeholder' => 'ej: {{name}}, {{email}}',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'is_markdown' => [
            'label' => 'Usar Markdown',
            'helper_text' => 'Indica si la plantilla utiliza sintaxis Markdown',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'status' => [
            'label' => 'Estado',
            'helper_text' => 'Estado actual de la plantilla',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'toggleColumns' => [
            'label' => 'toggleColumns',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'reorderRecords' => [
            'label' => 'reorderRecords',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'resetFilters' => [
            'label' => 'resetFilters',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'applyFilters' => [
            'label' => 'applyFilters',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'openFilters' => [
            'label' => 'openFilters',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'layout' => [
            'label' => 'layout',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'slug' => [
            'label' => 'slug',
            'description' => 'slug',
            'helper_text' => 'slug',
            'placeholder' => 'slug',
<<<<<<< HEAD
            'tooltip' => ''],
=======
            'tooltip' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'name' => [
            'description' => 'Nombre de la plantilla',
            'helper_text' => 'Nombre descriptivo para identificar la plantilla',
            'placeholder' => 'Ej: Bienvenida, Confirmación de pedido, Restablecer contraseña',
            'label' => 'Nombre de la Plantilla',
<<<<<<< HEAD
            'tooltip' => ''],
=======
            'tooltip' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'params' => [
            'label' => 'Parámetros',
            'helper_text' => 'Ingrese los parámetros separados por comas que se pueden utilizar en la plantilla',
            'placeholder' => 'name, email, date, company',
            'description' => 'Parámetros disponibles para la plantilla de correo electrónico',
<<<<<<< HEAD
            'tooltip' => '']],
=======
            'tooltip' => '',
        ],
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'filters' => [
        'search_placeholder' => 'Buscar plantillas...',
        'version' => [
            'label' => 'Versión',
<<<<<<< HEAD
            'placeholder' => 'Seleccionar versión']],
=======
            'placeholder' => 'Seleccionar versión',
        ],
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'actions' => [
        'create' => [
            'label' => 'Nueva Plantilla',
            'modal' => [
                'heading' => 'Crear Plantilla de Email',
                'description' => 'Ingrese los detalles para la nueva plantilla de email',
<<<<<<< HEAD
                'submit' => 'Crear']],
=======
                'submit' => 'Crear',
            ],
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'edit' => [
            'label' => 'Editar',
            'modal' => [
                'heading' => 'Editar Plantilla de Email',
                'description' => 'Modificar los detalles de la plantilla de email',
<<<<<<< HEAD
                'submit' => 'Guardar']],
=======
                'submit' => 'Guardar',
            ],
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'delete' => [
            'label' => 'Eliminar',
            'modal' => [
                'heading' => 'Eliminar Plantilla de Email',
                'description' => '¿Está seguro de que desea eliminar esta plantilla? Esta acción no se puede deshacer.',
<<<<<<< HEAD
                'submit' => 'Eliminar']],
        'restore' => [
            'label' => 'Restaurar'],
=======
                'submit' => 'Eliminar',
            ],
        ],
        'restore' => [
            'label' => 'Restaurar',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'force_delete' => [
            'label' => 'Eliminar Permanentemente',
            'modal' => [
                'heading' => 'Eliminar Permanentemente Plantilla de Email',
                'description' => '¿Está seguro de que desea eliminar permanentemente esta plantilla? Esta acción no se puede deshacer.',
<<<<<<< HEAD
                'submit' => 'Eliminar Permanentemente']],
=======
                'submit' => 'Eliminar Permanentemente',
            ],
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'new_version' => [
            'label' => 'Nueva Versión',
            'modal' => [
                'heading' => 'Crear Nueva Versión',
                'description' => 'Crear una nueva versión de la plantilla de email',
<<<<<<< HEAD
                'submit' => 'Crear Versión']],
=======
                'submit' => 'Crear Versión',
            ],
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'preview' => [
            'label' => 'Vista previa',
            'tooltip' => 'Visualizar vista previa del correo electrónico',
            'success_message' => 'Vista previa generada con éxito',
<<<<<<< HEAD
            'error_message' => 'Error al generar la vista previa'],
=======
            'error_message' => 'Error al generar la vista previa',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'test' => [
            'label' => 'Enviar prueba',
            'tooltip' => 'Enviar un correo electrónico de prueba',
            'success_message' => 'Correo electrónico de prueba enviado con éxito',
<<<<<<< HEAD
            'error_message' => 'Error al enviar el correo electrónico de prueba'],
=======
            'error_message' => 'Error al enviar el correo electrónico de prueba',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'duplicate' => [
            'label' => 'Duplicar',
            'tooltip' => 'Crear una copia de la plantilla',
            'success_message' => 'Plantilla duplicada con éxito',
<<<<<<< HEAD
            'error_message' => 'Error al duplicar la plantilla'],
=======
            'error_message' => 'Error al duplicar la plantilla',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'export' => [
            'label' => 'Exportar',
            'tooltip' => 'Exportar la plantilla en formato JSON',
            'success_message' => 'Plantilla exportada con éxito',
<<<<<<< HEAD
            'error_message' => 'Error al exportar la plantilla'],
=======
            'error_message' => 'Error al exportar la plantilla',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'import' => [
            'label' => 'Importar',
            'tooltip' => 'Importar una plantilla desde un archivo JSON',
            'success_message' => 'Plantilla importada con éxito',
<<<<<<< HEAD
            'error_message' => 'Error al importar la plantilla']],
=======
            'error_message' => 'Error al importar la plantilla',
        ],
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'messages' => [
        'created' => 'Plantilla de email creada exitosamente.',
        'updated' => 'Plantilla de email actualizada exitosamente.',
        'deleted' => 'Plantilla de email eliminada exitosamente.',
        'restored' => 'Plantilla de email restaurada exitosamente.',
        'force_deleted' => 'Plantilla de email eliminada permanentemente.',
        'version_created' => 'Nueva versión de plantilla creada exitosamente.',
        'success' => 'Operación completada con éxito',
        'error' => 'Ocurrió un error durante la operación',
        'confirmation' => '¿Está seguro de que desea proceder con esta operación?',
        'template_created' => 'La plantilla de email ha sido creada con éxito',
        'template_updated' => 'La plantilla de email ha sido actualizada con éxito',
<<<<<<< HEAD
        'template_deleted' => 'La plantilla de email ha sido eliminada con éxito'],
    'sections' => [
        'template' => [
            'label' => 'Plantilla',
            'description' => 'Información principal de la plantilla'],
        'versions' => [
            'label' => 'Versiones',
            'description' => 'Historial de versiones de la plantilla'],
        'logs' => [
            'label' => 'Registros',
            'description' => 'Historial de envío de la plantilla'],
=======
        'template_deleted' => 'La plantilla de email ha sido eliminada con éxito',
    ],
    'sections' => [
        'template' => [
            'label' => 'Plantilla',
            'description' => 'Información principal de la plantilla',
        ],
        'versions' => [
            'label' => 'Versiones',
            'description' => 'Historial de versiones de la plantilla',
        ],
        'logs' => [
            'label' => 'Registros',
            'description' => 'Historial de envío de la plantilla',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'main' => 'Información Principal',
        'content' => 'Contenido',
        'styling' => 'Estilo',
        'settings' => 'Configuraciones',
<<<<<<< HEAD
        'variables' => 'Variables'],
=======
        'variables' => 'Variables',
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'status' => [
        'sent' => 'Enviado',
        'delivered' => 'Entregado',
        'failed' => 'Fallido',
        'opened' => 'Abierto',
        'clicked' => 'Clicado',
        'bounced' => 'Rebotado',
<<<<<<< HEAD
        'spam' => 'Marcado como spam'],
    'model' => [
        'label' => 'plantilla de correo'],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label'];
=======
        'spam' => 'Marcado como spam',
    ],
    'model' => [
        'label' => 'plantilla de correo',
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
];
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
