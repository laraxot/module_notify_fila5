<?php

declare(strict_types=1);

// Notify translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Notify/docs/wiki — domain i18n only.
// File: lang/en/notification_template.php
return [
    'navigation' => [
        'icon' => 'heroicon-o-document-text',
        'label' => 'Notification Templates',
        'group' => 'System',
        'sort' => '52',
    ],
    'fields' => [
        'name' => [
            'label' => 'Name',
            'helper' => 'Unique template name',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'subject' => [
            'label' => 'Subject',
            'helper' => 'Notification subject',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'type' => [
            'label' => 'Type',
            'helper' => 'Notification type',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'body_text' => [
            'label' => 'Plain Text',
            'helper' => 'Plain text version of the notification',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'body_html' => [
            'label' => 'HTML',
            'helper' => 'HTML version of the notification',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'preview_data' => [
            'label' => 'Preview Data',
            'helper' => 'JSON data for preview',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'columns' => [
        'name' => 'Name',
        'subject' => 'Subject',
        'type' => 'Type',
        'created_at' => 'Created At',
        'updated_at' => 'Updated At',
    ],
    'actions' => [
        'preview' => 'Preview',
    ],
    'enums' => [
        'notification_type' => [
            'email' => 'Email',
            'sms' => 'SMS',
            'push' => 'Push Notification',
        ],
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
];
