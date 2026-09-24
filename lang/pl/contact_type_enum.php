<?php

declare(strict_types=1);

// Notify translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Notify/docs/wiki — domain i18n only.
// File: lang/pl/contact_type_enum.php
return [
    'phone' => [
        'label' => 'Telefon',
        'icon' => 'heroicon-o-phone',
        'color' => 'text-green-600',
        'hex_color' => '#16a34a',
        'description' => 'Numer telefonu stacjonarnego',
    ],
    'mobile' => [
        'label' => 'Telefon komórkowy',
        'icon' => 'heroicon-o-device-phone-mobile',
        'color' => 'text-purple-600',
        'hex_color' => '#9333ea',
        'description' => 'Numer telefonu komórkowego',
    ],
    'email' => [
        'label' => 'E-mail',
        'icon' => 'heroicon-o-envelope',
        'color' => 'text-blue-600',
        'hex_color' => '#2563eb',
        'description' => 'Adres e-mail',
    ],
    'pec' => [
        'label' => 'PEC',
        'icon' => 'heroicon-o-shield-check',
        'color' => 'text-orange-600',
        'hex_color' => '#ea580c',
        'description' => 'Certyfikowana poczta elektroniczna',
    ],
    'whatsapp' => [
        'label' => 'WhatsApp',
        'icon' => 'heroicon-o-chat-bubble-bottom-center-text',
        'color' => 'text-green-600',
        'hex_color' => '#25d366',
        'description' => 'Numer WhatsApp',
    ],
    'fax' => [
        'label' => 'Faks',
        'icon' => 'heroicon-o-printer',
        'color' => 'text-gray-600',
        'hex_color' => '#6b7280',
        'description' => 'Numer faksu',
    ],
    'notes' => [
        'label' => 'Notatki',
        'icon' => 'heroicon-o-document-text',
        'color' => 'text-gray-600',
        'hex_color' => '#6b7280',
        'description' => 'Notatki kontaktowe',
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
