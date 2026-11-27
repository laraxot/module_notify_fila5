<?php

declare(strict_types=1);

return [
    'navigation' => [
        'icon' => 'heroicon-o-document-text',
        'label' => 'Template Notifiche',
        'group' => 'Sistema',
        'sort' => 52,
    ],
    'fields' => [
        'name' => [
            'label' => 'Nome',
            'helper' => 'Nome univoco del template',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'subject' => [
            'label' => 'Oggetto',
            'helper' => 'Oggetto della notifica',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'type' => [
            'label' => 'Tipo',
            'helper' => 'Tipo di notifica',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'body_text' => [
            'label' => 'Testo Semplice',
            'helper' => 'Versione testo semplice della notifica',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'body_html' => [
            'label' => 'HTML',
            'helper' => 'Versione HTML della notifica',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'preview_data' => [
            'label' => 'Dati di Anteprima',
            'helper' => 'Dati JSON per l\'anteprima',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'resetFilters' => [
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'applyFilters' => [
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'columns' => [
        'name' => 'Nome',
        'subject' => 'Oggetto',
        'type' => 'Tipo',
        'created_at' => 'Creato il',
        'updated_at' => 'Aggiornato il',
    ],
    'actions' => [
        'preview' => 'Anteprima',
        'create' => [
            'icon' => 'create',
<<<<<<< HEAD
        ],
        'createAnother' => [
            'icon' => 'createAnother',
=======
            'label' => 'create',
        ],
        'createAnother' => [
            'icon' => 'createAnother',
            'label' => 'createAnother',
>>>>>>> laraxot/dev
        ],
        'delete' => [
            'icon' => 'delete',
        ],
        'save' => [
            'icon' => 'save',
        ],
        'view' => [
            'icon' => 'view',
        ],
        'edit' => [
            'icon' => 'edit',
        ],
<<<<<<< HEAD
=======
        'applyTableColumnManager' => [
            'label' => 'applyTableColumnManager',
        ],
        'openColumnManager' => [
            'label' => 'openColumnManager',
        ],
        'resetColumnManager' => [
            'label' => 'resetColumnManager',
        ],
        'profile' => [
            'label' => 'profile',
        ],
        'logout' => [
            'label' => 'logout',
        ],
        'cancel' => [
            'label' => 'cancel',
        ],
>>>>>>> laraxot/dev
    ],
    'enums' => [
        'notification_type' => [
            'email' => 'Email',
            'sms' => 'SMS',
            'push' => 'Notifica Push',
        ],
    ],
    'label' => 'Notification Template',
    'plural_label' => 'Notification Template (Plurale)',
];
