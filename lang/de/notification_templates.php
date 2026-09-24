<?php

declare(strict_types=1);

// Notify translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Notify/docs/wiki — domain i18n only.
// File: lang/de/notification_templates.php
return [
    'title' => 'Benachrichtigungs-Vorlagen',
    'name' => 'Name',
    'content' => 'Inhalt',
    'actions' => 'Aktionen',
    'create' => 'Vorlage erstellen',
    'edit' => 'Vorlage bearbeiten',
    'delete' => 'Vorlage löschen',
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
];
