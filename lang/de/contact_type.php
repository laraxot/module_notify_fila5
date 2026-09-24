<?php

declare(strict_types=1);

// Notify translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Notify/docs/wiki — domain i18n only.
// File: lang/de/contact_type.php
return [
    'fields' => [
        'phone' => [
            'label' => 'Telefon',
            'placeholder' => 'Telefonnummer eingeben',
            'helper_text' => '',
            'description' => 'Festnetztelefonnummer',
            'tooltip' => '',
        ],
        'mobile' => [
            'label' => 'Handy',
            'placeholder' => 'Handynummer eingeben',
            'helper_text' => '',
            'description' => 'Handynummer',
            'tooltip' => '',
        ],
        'email' => [
            'label' => 'E-Mail',
            'placeholder' => 'E-Mail-Adresse eingeben',
            'helper_text' => '',
            'description' => 'E-Mail-Adresse',
            'tooltip' => '',
        ],
        'pec' => [
            'label' => 'PEC',
            'placeholder' => 'PEC-Adresse eingeben',
            'helper_text' => '',
            'description' => 'Zertifizierte elektronische Post',
            'tooltip' => '',
        ],
        'whatsapp' => [
            'label' => 'WhatsApp',
            'placeholder' => 'WhatsApp-Nummer eingeben',
            'helper_text' => '',
            'description' => 'WhatsApp-Nummer',
            'tooltip' => '',
        ],
        'fax' => [
            'label' => 'Fax',
            'placeholder' => 'Faxnummer eingeben',
            'helper_text' => '',
            'description' => 'Faxnummer',
            'tooltip' => '',
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
    'actions' => [
    ],
];
