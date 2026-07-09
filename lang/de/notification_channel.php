<?php

declare(strict_types=1);

// Notify translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Notify/docs/wiki — domain i18n only.
// File: lang/de/notification_channel.php
return [
    'title' => 'Benachrichtigungskanal',
    'name' => 'Name',
    'description' => 'Beschreibung',
    'type' => 'Typ',
    'create' => 'Kanal erstellen',
    'edit' => 'Kanal bearbeiten',
    'delete' => 'Kanal löschen',
    'navigation' => [
        'label' => 'Missing Navigation Label',
        'plural_label' => 'Missing Navigation Plural Label',
        'group' => 'Missing Group',
        'icon' => 'heroicon-o-puzzle-piece',
        'sort' => 100,
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
    'fields' => [
    ],
    'actions' => [
    ],
];
