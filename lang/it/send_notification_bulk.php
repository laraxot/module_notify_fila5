<?php

declare(strict_types=1);

// Notify translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Notify/docs/wiki — domain i18n only.
// File: lang/it/send_notification_bulk.php
return [
    'fields' => [
        'template_slug' => [
            'label' => 'template_slug',
            'placeholder' => 'template_slug',
            'helper_text' => 'template_slug',
            'description' => 'template_slug',
            'tooltip' => '',
        ],
        'channels' => [
            'label' => 'channels',
            'placeholder' => 'channels',
            'helper_text' => 'channels',
            'description' => 'channels',
            'tooltip' => '',
        ],
    ],
    'actions' => [
        'cancel' => [
            'tooltip' => 'cancel',
            'label' => 'cancel',
            'icon' => 'cancel',
        ],
        'submit' => [
            'label' => 'submit',
            'icon' => 'submit',
            'tooltip' => 'submit',
        ],
    ],
    'label' => 'Send Notification Bulk',
    'plural_label' => 'Send Notification Bulk (Plurale)',
    'navigation' => [
        'name' => 'Send Notification Bulk',
        'plural' => 'Send Notification Bulk',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Send Notification Bulk',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
    ],
];
