<?php

declare(strict_types=1);

// Notify translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Notify/docs/wiki — domain i18n only.
// File: lang/it/create_mail_template.php
return [
    'fields' => [
        'mailable' => [
            'label' => 'mailable',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'subject' => [
            'label' => 'subject',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'html_template' => [
            'label' => 'html_template',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'text_template' => [
            'label' => 'text_template',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
        'create' => [
            'label' => 'create',
        ],
        'createAnother' => [
            'label' => 'createAnother',
        ],
        'cancel' => [
            'label' => 'cancel',
        ],
    ],
    'label' => 'Create Mail Template',
    'plural_label' => 'Create Mail Template (Plurale)',
    'navigation' => [
        'name' => 'Create Mail Template',
        'plural' => 'Create Mail Template',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Create Mail Template',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
    ],
];
