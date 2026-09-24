<?php

declare(strict_types=1);

// Notify translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Notify/docs/wiki — domain i18n only.
// File: lang/it/slack_notification.php
return [
    'navigation' => [
        'label' => 'Slack Notification',
        'group' => 'Notifiche',
    ],
    'label' => 'Slack Notification',
    'plural_label' => 'Slack Notification (Plurale)',
    'fields' => [
        'id' => [
            'label' => 'Identificativo',
            'tooltip' => 'Identificativo univoco del record',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Data Creazione',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'updated_at' => [
            'label' => 'Ultima Modifica',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
        'create' => [
            'label' => 'Crea Slack Notification',
        ],
        'edit' => [
            'label' => 'Modifica Slack Notification',
        ],
        'delete' => [
            'label' => 'Elimina Slack Notification',
        ],
    ],
];
