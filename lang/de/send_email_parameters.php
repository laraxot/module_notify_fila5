<?php

declare(strict_types=1);

// Notify translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Notify/docs/wiki — domain i18n only.
// File: lang/de/send_email_parameters.php
return [
    'resource' => [
        'name' => 'send_email_parameters',
    ],
    'navigation' => [
        'name' => 'send_email_parameters',
        'plural' => 'send_email_parameters',
        'group' => [
            'name' => 'Invia',
        ],
    ],
    'fields' => [
        'name' => [
            'label' => 'Nome Area',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'parent' => [
            'label' => 'Settore di appartenenza',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'parent.name' => [
            'label' => 'Settore di appartenenza',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'parent_name' => [
            'label' => 'Settore di appartenenza',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'assets' => [
            'label' => 'Quantità di asset',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
        'import' => [
            'name' => 'Importa da file',
            'fields' => [
                'import_file' => 'Seleziona un file XLS o CSV da caricare',
            ],
        ],
        'export' => [
            'name' => 'Esporta dati',
            'filename_prefix' => 'Aree al',
            'columns' => [
                'name' => 'Nome area',
                'parent_name' => 'Nome area livello superiore',
            ],
        ],
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
];
