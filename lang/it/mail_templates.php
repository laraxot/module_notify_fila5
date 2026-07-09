<?php

declare(strict_types=1);

// Notify translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Notify/docs/wiki — domain i18n only.
// File: lang/it/mail_templates.php
return [
    'fields' => [
        'id' => [
            'label' => 'id',
        ],
        'name' => [
            'label' => 'name',
        ],
        'mailable' => [
            'label' => 'mailable',
        ],
        'slug' => [
            'label' => 'slug',
        ],
        'counter' => [
            'label' => 'counter',
        ],
        'version' => [
            'label' => 'version',
        ],
        'created_at' => [
            'label' => 'created_at',
        ],
        'updated_at' => [
            'label' => 'updated_at',
        ],
    ],
];
