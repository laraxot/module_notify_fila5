<?php

declare(strict_types=1);

// Notify translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Notify/docs/wiki — domain i18n only.
// File: lang/de/send_spatie_email.php
return [
    'navigation' => [
        'label' => 'Invio Email (Spatie)',
        'group' => 'Notifiche',
    ],
    'actions' => [
        'emailFormActions' => [
            'label' => 'emailFormActions',
        ],
    ],
    'fields' => [
        'body_html' => [
            'description' => 'body_html',
            'helper_text' => 'body_html',
            'placeholder' => 'body_html',
            'label' => 'body_html',
            'tooltip' => '',
        ],
        'subject' => [
            'description' => 'subject',
            'helper_text' => 'subject',
            'placeholder' => 'subject',
            'label' => 'subject',
            'tooltip' => '',
        ],
        'to' => [
            'description' => 'to',
            'helper_text' => 'to',
            'placeholder' => 'to',
            'label' => 'to',
            'tooltip' => '',
        ],
        'mail_templates' => [
            'description' => 'mail_templates',
            'helper_text' => 'mail_templates',
            'placeholder' => 'mail_templates',
            'label' => '',
            'tooltip' => '',
        ],
        'mail_template_slug' => [
            'description' => 'mail_template_slug',
            'helper_text' => 'mail_template_slug',
            'placeholder' => 'mail_template_slug',
            'label' => 'mail_template_slug',
            'tooltip' => '',
        ],
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
];
