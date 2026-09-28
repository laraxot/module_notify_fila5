<?php

declare(strict_types=1);

return [
    'navigation' => [
<<<<<<< HEAD
        'label' => 'Invio Email (AWS)',
        'group' => 'Notifiche',
        'icon' => 'heroicon-o-envelope',
        'color' => 'primary',
        'sort' => 10,
    ],
    'model' => [
        'label' => 'Email AWS',
        'plural' => 'Email AWS',
        'description' => 'Gestione invio email tramite servizio Amazon SES',
    ],
=======
        'label' => 'Invio Email (AWS]',
        'group' => 'Notifiche',
        'icon' => 'heroicon-o-envelope',
        'color' => 'primary',
        'sort' => 10],
    'model' => [
        'label' => 'Email AWS',
        'plural' => 'Email AWS',
        'description' => 'Gestione invio email tramite servizio Amazon SES'],
>>>>>>> laraxot/dev
    'fields' => [
        'to' => [
            'label' => 'Destinatario Email',
            'placeholder' => 'Inserisci indirizzo email destinatario',
            'help' => 'Indirizzo email del destinatario principale del messaggio',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => '',
        ],
=======
            'description' => ''],
>>>>>>> laraxot/dev
        'subject' => [
            'label' => 'Oggetto Email',
            'placeholder' => 'Inserisci l\'oggetto del messaggio',
            'help' => 'Testo che apparirà come oggetto dell\'email ricevuta',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => '',
        ],
=======
            'description' => ''],
>>>>>>> laraxot/dev
        'body_html' => [
            'label' => 'Corpo HTML',
            'placeholder' => 'Inserisci il contenuto HTML dell\'email',
            'help' => 'Contenuto formattato in HTML per email con layout avanzato',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => '',
        ],
=======
            'description' => ''],
>>>>>>> laraxot/dev
        'template' => [
            'label' => 'Template Email',
            'placeholder' => 'Seleziona un template predefinito',
            'help' => 'Template predefinito da utilizzare per la formattazione dell\'email',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => '',
        ],
=======
            'description' => ''],
>>>>>>> laraxot/dev
        'add_attachments' => [
            'label' => 'Allegati Email',
            'placeholder' => 'Carica file da allegare al messaggio',
            'help' => 'File allegati che verranno inviati insieme all\'email',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => '',
        ],
        'recipient' => [
            'label' => 'recipient',
            'placeholder' => 'recipient',
            'helper_text' => 'recipient',
            'description' => 'recipient']],
=======
            'description' => '']],
>>>>>>> laraxot/dev
    'actions' => [
        'send_email' => ['label' => 'Invia Email', 'icon' => 'heroicon-o-paper-airplane', 'color' => 'success', 'modal_heading' => 'Conferma invio email', 'modal_description' => 'Sei sicuro di voler inviare questa email?', 'success' => 'Email inviata con successo tramite AWS SES', 'error' => 'Errore durante l\'invio dell\'email', 'confirmation' => 'L\'email verrà inviata immediatamente'],
        'logout' => ['tooltip' => 'logout', 'icon' => 'logout', 'label' => 'logout'],
        'sendEmail' => ['label' => 'sendEmail', 'icon' => 'sendEmail', 'tooltip' => 'sendEmail'],
<<<<<<< HEAD
        'save' => ['label' => 'save', 'icon' => 'save', 'tooltip' => 'save'],
        'profile' => ['label' => 'profile', 'icon' => 'profile', 'tooltip' => 'profile']],
    'messages' => ['loading' => 'Preparazione email in corso...', 'sent' => 'Email inviata correttamente', 'queue' => 'Email aggiunta alla coda di invio', 'failed' => 'Invio email fallito'],
    'label' => 'Send Aws Email',
    'plural_label' => 'Send Aws Email (Plurale)',
];
=======
        'save' => ['label' => 'save', 'icon' => 'save', 'tooltip' => 'save']],
    'messages' => ['loading' => 'Preparazione email in corso...', 'sent' => 'Email inviata correttamente', 'queue' => 'Email aggiunta alla coda di invio', 'failed' => 'Invio email fallito'],
    'label' => 'Send Aws Email',
    'plural_label' => 'Send Aws Email (Plurale)'];
>>>>>>> laraxot/dev
