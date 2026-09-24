<?php

declare(strict_types=1);

// Notify translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Notify/docs/wiki — domain i18n only.
// File: lang/it/mail_template_select.php
return [
    'fields' => [
        'mail_template_slug' => [
            'label' => 'mail_template_slug',
            'placeholder' => 'mail_template_slug',
            'helper_text' => 'mail_template_slug',
            'description' => 'mail_template_slug',
            'tooltip' => '',
        ],
    ],
    'label' => 'Mail Template Select',
    'plural_label' => 'Mail Template Select (Plurale)',
    'navigation' => [
        'name' => 'Mail Template Select',
        'plural' => 'Mail Template Select',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Mail Template Select',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
    ],
    'actions' => [
        'create' => [
            'label' => 'Crea Mail Template Select',
        ],
        'edit' => [
            'label' => 'Modifica Mail Template Select',
        ],
        'delete' => [
            'label' => 'Elimina Mail Template Select',
        ],
    ],
];
