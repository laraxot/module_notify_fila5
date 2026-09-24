<?php

declare(strict_types=1);

// Notify translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Notify/docs/wiki — domain i18n only.
// File: lang/it/send_whats_app.php
return [
    'navigation' => [
        'label' => 'WhatsApp',
        'group' => 'Notify',
        'icon' => 'heroicon-o-chat-bubble-left-right',
        'sort' => 10,
    ],
    'fields' => [
        'phone_number' => [
            'label' => 'Numero Telefono',
            'placeholder' => 'Inserisci numero WhatsApp',
            'helper_text' => 'Numero di telefono per l\'invio WhatsApp',
            'tooltip' => '',
            'description' => '',
        ],
        'message' => [
            'label' => 'Messaggio',
            'placeholder' => 'Inserisci messaggio WhatsApp',
            'helper_text' => 'Testo del messaggio da inviare',
            'tooltip' => '',
            'description' => '',
        ],
        'template' => [
            'label' => 'Template',
            'placeholder' => 'Seleziona template',
            'help' => 'Template predefinito per il messaggio',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
        'send' => [
            'label' => 'Invia WhatsApp',
            'tooltip' => 'Invia messaggio WhatsApp',
            'success' => 'Messaggio WhatsApp inviato con successo',
            'error' => 'Errore nell\'invio del messaggio WhatsApp',
        ],
    ],
    'label' => 'Send Whats App',
    'plural_label' => 'Send Whats App (Plurale)',
];
