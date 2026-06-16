<?php

declare(strict_types=1);

return [
    'argomenti' => [
        'group' => 'sito',
        'template' => 'argomenti',
        'title' => 'Argomenti',
        'description' => 'Replica Tailwind/Vite della pagina ufficiale degli argomenti.',
        'eyebrow' => 'Lista Argomenti',
        'intro' => "Gli argomenti organizzano contenuti, informazioni e documenti del sito istituzionale per temi chiari e navigabili.",
        'breadcrumbs' => [
            ['label' => 'Home', 'url' => '/'.app()->getLocale()],
            ['label' => 'Lista Argomenti'],
        ],
        'featuredTopics' => [
            ['title' => 'Cultura', 'image' => 'https://picsum.photos/seed/fixcity-cultura/640/820'],
            ['title' => 'Sport', 'image' => 'https://picsum.photos/seed/fixcity-sport/640/820'],
            ['title' => 'Famiglia', 'image' => 'https://picsum.photos/seed/fixcity-famiglia/640/820'],
        ],
        'topics' => [
            ['title' => 'Agricoltura', 'description' => 'Bandi, concessioni, pratiche e informazioni operative per imprese agricole e cittadini.'],
            ['title' => 'Animale domestico', 'description' => 'Servizi, regolamenti e procedure comunali dedicate alla cura e gestione degli animali.'],
            ['title' => 'Assistenza sociale', 'description' => 'Sostegni, contributi e sportelli per persone, famiglie e fragilita sociali.'],
            ['title' => 'Associazioni', 'description' => 'Spazi, avvisi e opportunita per le realta associative del territorio.'],
            ['title' => 'Ambiente', 'description' => 'Raccolta rifiuti, verde pubblico, qualita urbana e iniziative di sostenibilita.'],
            ['title' => 'Mobilita', 'description' => 'Parcheggi, trasporto locale, viabilita e servizi per gli spostamenti quotidiani.'],
        ],
    ],
    'appuntamento-06-conferma' => [
        'group' => 'sito',
        'template' => 'appointment-confirmation',
        'title' => 'Appuntamento confermato',
        'description' => 'Replica Tailwind/Vite della schermata finale del flusso appuntamento.',
        'eyebrow' => 'Prenotazione appuntamento',
        'intro' => "L'appuntamento e stato registrato con successo e il riepilogo e stato inviato all'indirizzo email indicato.",
        'appointment' => 'Giovedi 11 marzo 2022 dalle ore 10:00 alle ore 10:30',
        'email' => 'giulia.bianchi@gmail.com',
        'breadcrumbs' => [
            ['label' => 'Home', 'url' => '/'.app()->getLocale()],
            ['label' => 'Prenotazione appuntamento'],
        ],
        'index' => [
            ['label' => 'Cosa serve', 'anchor' => 'needed'],
            ['label' => 'Indirizzo', 'anchor' => 'address'],
            ['label' => 'Aggiungi al tuo calendario', 'anchor' => 'calendar'],
        ],
        'requirements' => [
            'Documento di identita',
        ],
        'office' => [
            'name' => 'Ufficio anagrafe 03',
            'address' => 'Via Grazia Deledda 9/a - 20127 Milano',
            'email' => 'anagrafe@comune.it',
        ],
        'calendarLinks' => [
            ['label' => 'Google Calendar', 'url' => '#'],
            ['label' => 'Apple Calendar', 'url' => '#'],
            ['label' => 'Outlook', 'url' => '#'],
        ],
    ],
];
