<?php

declare(strict_types=1);

// Notify translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Notify/docs/wiki — domain i18n only.
// File: lang/de/columns.php
return [
    'contact' => [
        'label' => 'Kontakt',
        'empty_state' => 'Kein Kontakt',
        'verified' => 'Verifiziert',
        'sms' => 'SMS',
        'email' => 'E-Mail',
        'tooltip' => [
            'type' => 'Typ',
            'verified' => 'Verifiziert',
            'sms_sent' => 'SMS gesendet',
            'email_sent' => 'E-Mails gesendet',
        ],
    ],
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
