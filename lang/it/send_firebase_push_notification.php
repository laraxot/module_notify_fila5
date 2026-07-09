<?php

declare(strict_types=1);

// Notify translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Notify/docs/wiki — domain i18n only.
// File: lang/it/send_firebase_push_notification.php
return [
    'navigation' => [
        'label' => 'Invio Push Notification',
        'group' => 'Notifiche',
    ],
    'label' => 'Send Firebase Push Notification',
    'plural_label' => 'Send Firebase Push Notification (Plurale)',
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
            'label' => 'Crea Send Firebase Push Notification',
        ],
        'edit' => [
            'label' => 'Modifica Send Firebase Push Notification',
        ],
        'delete' => [
            'label' => 'Elimina Send Firebase Push Notification',
        ],
    ],
];
