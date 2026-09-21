<?php

declare(strict_types=1);

return [
    'resource' => [
        'name' => 'Dashboard',
<<<<<<< HEAD
        'plural' => 'Dashboard'],
=======
        'plural' => 'Dashboard',
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'navigation' => [
        'name' => 'Dashboard',
        'plural' => 'Dashboard',
        'group' => [
            'name' => 'Notifiche',
<<<<<<< HEAD
            'description' => 'Panoramica delle notifiche'],
        'label' => 'Dashboard',
        'sort' => '49',
        'icon' => 'notify-dashboard-animated',
        'description' => 'Panoramica del sistema di notifiche'],
    'widgets' => [
        'total_notifications' => [
            'label' => 'Totale Notifiche',
            'description' => 'Numero totale di notifiche nel sistema'],
        'unread_notifications' => [
            'label' => 'Notifiche Non Lette',
            'description' => 'Numero di notifiche ancora da leggere'],
        'notifications_by_type' => [
            'label' => 'Notifiche per Tipo',
            'description' => 'Distribuzione delle notifiche per tipologia'],
        'recent_notifications' => [
            'label' => 'Notifiche Recenti',
            'description' => 'Elenco delle notifiche più recenti'],
        'notification_trends' => [
            'label' => 'Trend Notifiche',
            'description' => 'Andamento delle notifiche nel tempo'],
        'channel_status' => [
            'label' => 'Stato Canali',
            'description' => 'Stato operativo dei canali di notifica'],
        'top_recipients' => [
            'label' => 'Destinatari Principali',
            'description' => 'Utenti che ricevono più notifiche']],
    'cards' => [
        'overall_status' => [
            'label' => 'Stato Generale',
            'description' => 'Panoramica dello stato del sistema di notifiche'],
        'channels' => [
            'label' => 'Canali',
            'description' => 'Configurazione dei canali di notifica'],
        'templates' => [
            'label' => 'Template',
            'description' => 'Template disponibili per le notifiche'],
        'logs' => [
            'label' => 'Log',
            'description' => 'Registri delle attività di notifica']],
=======
            'description' => 'Panoramica delle notifiche',
        ],
        'label' => 'Dashboard',
        'sort' => '49',
        'icon' => 'notify-dashboard-animated',
        'description' => 'Panoramica del sistema di notifiche',
    ],
    'widgets' => [
        'total_notifications' => [
            'label' => 'Totale Notifiche',
            'description' => 'Numero totale di notifiche nel sistema',
        ],
        'unread_notifications' => [
            'label' => 'Notifiche Non Lette',
            'description' => 'Numero di notifiche ancora da leggere',
        ],
        'notifications_by_type' => [
            'label' => 'Notifiche per Tipo',
            'description' => 'Distribuzione delle notifiche per tipologia',
        ],
        'recent_notifications' => [
            'label' => 'Notifiche Recenti',
            'description' => 'Elenco delle notifiche più recenti',
        ],
        'notification_trends' => [
            'label' => 'Trend Notifiche',
            'description' => 'Andamento delle notifiche nel tempo',
        ],
        'channel_status' => [
            'label' => 'Stato Canali',
            'description' => 'Stato operativo dei canali di notifica',
        ],
        'top_recipients' => [
            'label' => 'Destinatari Principali',
            'description' => 'Utenti che ricevono più notifiche',
        ],
    ],
    'cards' => [
        'overall_status' => [
            'label' => 'Stato Generale',
            'description' => 'Panoramica dello stato del sistema di notifiche',
        ],
        'channels' => [
            'label' => 'Canali',
            'description' => 'Configurazione dei canali di notifica',
        ],
        'templates' => [
            'label' => 'Template',
            'description' => 'Template disponibili per le notifiche',
        ],
        'logs' => [
            'label' => 'Log',
            'description' => 'Registri delle attività di notifica',
        ],
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'actions' => [
        'refresh' => [
            'label' => 'Aggiorna',
            'tooltip' => 'Aggiorna i dati della dashboard',
            'success_message' => 'Dashboard aggiornata con successo',
<<<<<<< HEAD
            'error_message' => 'Errore nell\'aggiornamento della dashboard'],
=======
            'error_message' => 'Errore nell\'aggiornamento della dashboard',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'export' => [
            'label' => 'Esporta Dati',
            'tooltip' => 'Esporta i dati statistici in formato CSV',
            'success_message' => 'Dati esportati con successo',
<<<<<<< HEAD
            'error_message' => 'Errore nell\'esportazione dei dati']],
=======
            'error_message' => 'Errore nell\'esportazione dei dati',
        ],
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'messages' => [
        'success' => 'Operazione completata con successo',
        'error' => 'Si è verificato un errore durante l\'operazione',
        'no_data' => 'Nessun dato disponibile per il periodo selezionato',
<<<<<<< HEAD
        'loading' => 'Caricamento dati in corso...'],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
    'fields' => [
    ]];
=======
        'loading' => 'Caricamento dati in corso...',
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
    'fields' => [
    ],
];
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
