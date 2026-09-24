<?php

declare(strict_types=1);

// Notify translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Notify/docs/wiki — domain i18n only.
// File: lang/de/send_vonage_sms.php
return [
    'title' => 'Vonage SMS senden',
    'message' => 'Nachricht',
    'send' => 'Senden',
    'sent' => 'SMS erfolgreich gesendet',
    'failed' => 'Fehler beim Senden der SMS',
    'recipient' => 'Empfänger',
    'phone' => 'Telefonnummer',
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
