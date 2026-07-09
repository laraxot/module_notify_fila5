<?php

declare(strict_types=1);

// Notify translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Notify/docs/wiki — domain i18n only.
// File: lang/it/html_layout_path_select.php
return [
    'fields' => [
        'html_layout_path' => [
            'label' => 'html_layout_path',
            'placeholder' => 'html_layout_path',
            'helper_text' => 'html_layout_path',
            'description' => 'html_layout_path',
            'tooltip' => '',
        ],
    ],
    'label' => 'Html Layout Path Select',
    'plural_label' => 'Html Layout Path Select (Plurale)',
    'navigation' => [
        'name' => 'Html Layout Path Select',
        'plural' => 'Html Layout Path Select',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Html Layout Path Select',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
    ],
    'actions' => [
        'create' => [
            'label' => 'Crea Html Layout Path Select',
        ],
        'edit' => [
            'label' => 'Modifica Html Layout Path Select',
        ],
        'delete' => [
            'label' => 'Elimina Html Layout Path Select',
        ],
    ],
];
