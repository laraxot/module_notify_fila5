<?php

declare(strict_types=1);

// Notify translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Notify/docs/wiki — domain i18n only.
// File: lang/it/channel_checkbox_list.php
return [
    'fields' => [
        'channels' => [
            'label' => 'channels',
            'placeholder' => 'channels',
            'helper_text' => 'channels',
            'description' => 'channels',
            'tooltip' => '',
        ],
    ],
    'label' => 'Channel Checkbox List',
    'plural_label' => 'Channel Checkbox List (Plurale)',
    'navigation' => [
        'name' => 'Channel Checkbox List',
        'plural' => 'Channel Checkbox List',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Channel Checkbox List',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
    ],
    'actions' => [
        'create' => [
            'label' => 'Crea Channel Checkbox List',
        ],
        'edit' => [
            'label' => 'Modifica Channel Checkbox List',
        ],
        'delete' => [
            'label' => 'Elimina Channel Checkbox List',
        ],
    ],
];
