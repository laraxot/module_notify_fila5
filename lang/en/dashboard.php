<?php

declare(strict_types=1);

return [
    'resource' => [
        'name' => 'Dashboard',
        'plural' => 'Dashboard',
    ],
    'navigation' => [
        'name' => 'Dashboard',
        'plural' => 'Dashboard',
        'group' => [
<<<<<<< .merge_file_Wf9Jvd
            'name' => 'Notifications',
            'description' => 'Notifications overview'],
        'label' => 'Dashboard',
        'sort' => '49',
        'icon' => 'notify-dashboard-animated',
        'description' => 'Notification system overview'],
    'widgets' => [
        'total_notifications' => [
            'label' => 'Total Notifications',
            'description' => 'Total number of notifications in the system'],
        'unread_notifications' => [
            'label' => 'Unread Notifications',
            'description' => 'Number of notifications still to read'],
        'notifications_by_type' => [
            'label' => 'Notifications by Type',
            'description' => 'Distribution of notifications by type'],
        'recent_notifications' => [
            'label' => 'Recent Notifications',
            'description' => 'List of the most recent notifications'],
        'notification_trends' => [
            'label' => 'Notification Trend',
            'description' => 'Notification trend over time'],
        'channel_status' => [
            'label' => 'Channel Status',
            'description' => 'Operational status of notification channels'],
        'top_recipients' => [
            'label' => 'Top Recipients',
            'description' => 'Users who receive the most notifications']],
    'cards' => [
        'overall_status' => [
            'label' => 'Overall Status',
            'description' => 'Overview of the notification system status'],
        'channels' => [
            'label' => 'Channels',
            'description' => 'Notification channel configuration'],
        'templates' => [
            'label' => 'Template',
            'description' => 'Templates available for notifications'],
        'logs' => [
            'label' => 'Log',
            'description' => 'Notification activity logs']],
    'actions' => [
        'refresh' => [
            'label' => 'Refresh',
            'tooltip' => 'Refresh the dashboard data',
            'success_message' => 'Dashboard refreshed successfully',
            'error_message' => 'Error refreshing the dashboard'],
        'export' => [
            'label' => 'Esporta Dati',
            'tooltip' => 'Esporta i dati statistici in formato CSV',
            'success_message' => 'Data exported successfully',
            'error_message' => 'Error exporting the data']],
    'messages' => [
        'success' => 'Operation completed successfully',
        'error' => 'An error occurred during the operation',
        'no_data' => 'No data available for the selected period',
        'loading' => 'Caricamento dati in corso...'],
=======
            'name' => 'Notifiche',
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
    'actions' => [
        'refresh' => [
            'label' => 'Aggiorna',
            'tooltip' => 'Aggiorna i dati della dashboard',
            'success_message' => 'Dashboard aggiornata con successo',
            'error_message' => 'Errore nell\'aggiornamento della dashboard',
        ],
        'export' => [
            'label' => 'Esporta Dati',
            'tooltip' => 'Esporta i dati statistici in formato CSV',
            'success_message' => 'Dati esportati con successo',
            'error_message' => 'Errore nell\'esportazione dei dati',
        ],
    ],
    'messages' => [
        'success' => 'Operazione completata con successo',
        'error' => 'Si è verificato un errore durante l\'operazione',
        'no_data' => 'Nessun dato disponibile per il periodo selezionato',
        'loading' => 'Caricamento dati in corso...',
    ],
>>>>>>> .merge_file_xJs8rP
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
];
