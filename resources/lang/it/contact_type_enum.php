<?php

declare(strict_types=1);

// Notify translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Notify/docs/wiki — domain i18n only.
// File: resources/lang/it/contact_type_enum.php
return [
    'phone' => [
        'label' => 'Telefono Fisso',
        'color' => 'success',
        'icon' => 'heroicon-o-phone',
        'description' => 'Numero di telefono fisso aziendale o personale.',
    ],
    'mobile' => [
        'label' => 'Cellulare',
        'color' => 'info',
        'icon' => 'heroicon-o-device-phone-mobile',
        'description' => 'Numero di cellulare per contatti diretti.',
    ],
    'email' => [
        'label' => 'Email',
        'color' => 'primary',
        'icon' => 'heroicon-o-envelope',
        'description' => 'Indirizzo email standard.',
    ],
    'pec' => [
        'label' => 'PEC',
        'color' => 'warning',
        'icon' => 'heroicon-o-shield-check',
        'description' => 'Posta Elettronica Certificata.',
    ],
    'whatsapp' => [
        'label' => 'WhatsApp',
        'color' => 'success',
        'icon' => 'heroicon-o-chat-bubble-bottom-center-text',
        'description' => 'Numero abilitato a WhatsApp Business.',
    ],
    'fax' => [
        'label' => 'Fax',
        'color' => 'gray',
        'icon' => 'heroicon-o-printer',
        'description' => 'Numero di fax per trasmissioni documenti.',
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
