<?php

declare(strict_types=1);

return [
    'resource' => [
<<<<<<< .merge_file_eQdHK5
        'name' => 'Notification',
        'plural' => 'Notifications'],
=======
        'name' => 'Notifica',
        'plural' => 'Notifiche',
    ],
>>>>>>> .merge_file_nQ9ms0
    'navigation' => [
        'name' => 'Notification Management',
        'plural' => 'Notification Management',
        'group' => [
            'name' => 'Sistema',
<<<<<<< .merge_file_eQdHK5
            'description' => 'Centralized management of system notifications'],
        'label' => 'Notification Management',
=======
            'description' => 'Gestione centralizzata delle notifiche di sistema',
        ],
        'label' => 'Gestione Notifiche',
>>>>>>> .merge_file_nQ9ms0
        'icon' => 'notify-notification-animated',
        'sort' => '46',
    ],
    'fields' => [
        'title' => [
            'label' => 'Titolo',
            'helper_text' => 'Notification title',
            'placeholder' => 'Enter the title',
            'tooltip' => '',
            'description' => '',
        ],
        'message' => [
            'label' => 'Message',
            'helper_text' => 'Notification content',
            'placeholder' => 'Enter the message',
            'tooltip' => '',
            'description' => '',
        ],
        'type' => [
            'label' => 'Tipo',
            'helper_text' => 'Notification type',
            'placeholder' => 'Select the type',
            'options' => [
                'system' => 'Sistema',
                'alert' => 'Avviso',
                'info' => 'Informazione',
                'success' => 'Successo',
                'warning' => 'Attenzione',
<<<<<<< .merge_file_eQdHK5
                'error' => 'Error'],
=======
                'error' => 'Errore',
            ],
>>>>>>> .merge_file_nQ9ms0
            'tooltip' => '',
            'description' => '',
        ],
        'status' => [
            'label' => 'Status',
            'helper_text' => 'Current notification status',
            'placeholder' => 'Seleziona lo stato',
            'options' => [
                'unread' => 'Non letta',
                'read' => 'Letta',
                'archived' => 'Archiviata',
            ],
            'tooltip' => '',
            'description' => '',
        ],
        'recipient' => [
            'label' => 'Recipient',
            'helper_text' => 'User receiving the notification',
            'placeholder' => 'Select the recipient',
            'tooltip' => '',
            'description' => '',
        ],
        'sent_at' => [
            'label' => 'Sent at',
            'helper_text' => 'Notification send date and time',
            'tooltip' => '',
            'description' => '',
        ],
        'read_at' => [
            'label' => 'Read at',
            'helper_text' => 'Notification read date and time',
            'tooltip' => '',
            'description' => '',
        ],
        'archived_at' => [
            'label' => 'Archived at',
            'helper_text' => 'Notification archive date and time',
            'tooltip' => '',
            'description' => '',
        ],
        'channel' => [
            'label' => 'Channel',
            'tooltip' => 'Channel used to send the notification',
            'helper_text' => 'Select the channel to send the notification through',
            'placeholder' => 'Seleziona un canale',
            'options' => [
                'email' => [
                    'label' => 'Email',
<<<<<<< .merge_file_eQdHK5
                    'tooltip' => 'Send via email'],
                'sms' => [
                    'label' => 'SMS',
                    'tooltip' => 'Send via SMS'],
                'push' => [
                    'label' => 'Push',
                    'tooltip' => 'Send as push notification'],
                'telegram' => [
                    'label' => 'Telegram',
                    'tooltip' => 'Send via Telegram']],
            'description' => ''],
=======
                    'tooltip' => 'Invia tramite email',
                ],
                'sms' => [
                    'label' => 'SMS',
                    'tooltip' => 'Invia tramite SMS',
                ],
                'push' => [
                    'label' => 'Push',
                    'tooltip' => 'Invia come notifica push',
                ],
                'telegram' => [
                    'label' => 'Telegram',
                    'tooltip' => 'Invia tramite Telegram',
                ],
            ],
            'description' => '',
        ],
>>>>>>> .merge_file_nQ9ms0
        'template' => [
            'label' => 'Template',
            'tooltip' => 'Template to use for the notification',
            'helper_text' => 'Choose the default template for this notification',
            'placeholder' => 'Seleziona un template',
            'options' => [
                'subject' => [
<<<<<<< .merge_file_eQdHK5
                    'label' => 'Subject',
                    'tooltip' => 'Notification subject',
                    'placeholder' => 'e.g. Important notification'],
                'body' => [
                    'label' => 'Corpo',
                    'tooltip' => 'Main notification content',
                    'placeholder' => 'Enter the notification text...'],
                'variables' => [
                    'label' => 'Variabili disponibili',
                    'tooltip' => 'Variables that can be used in the template',
                    'helper_text' => 'Use {variable} to insert dynamic values']],
            'description' => ''],
=======
                    'label' => 'Oggetto',
                    'tooltip' => 'Oggetto della notifica',
                    'placeholder' => 'es: Notifica importante',
                ],
                'body' => [
                    'label' => 'Corpo',
                    'tooltip' => 'Contenuto principale della notifica',
                    'placeholder' => 'Inserisci il testo della notifica...',
                ],
                'variables' => [
                    'label' => 'Variabili disponibili',
                    'tooltip' => 'Variabili che possono essere utilizzate nel template',
                    'helper_text' => 'Usa {variable} per inserire valori dinamici',
                ],
            ],
            'description' => '',
        ],
>>>>>>> .merge_file_nQ9ms0
        'schedule' => [
            'label' => 'Programmazione',
            'tooltip' => 'When to send the notification',
            'helper_text' => 'Set when the notification should be sent',
            'placeholder' => 'Select the scheduling option',
            'options' => [
                'immediate' => [
                    'label' => 'Immediata',
<<<<<<< .merge_file_eQdHK5
                    'tooltip' => 'Send the notification now'],
                'scheduled' => [
                    'label' => 'Programmata',
                    'tooltip' => 'Schedule sending for a specific date'],
                'date' => [
                    'label' => 'Date',
                    'tooltip' => 'Scheduled send date',
                    'placeholder' => 'es: 01/01/2024'],
                'time' => [
                    'label' => 'Ora',
                    'tooltip' => 'Scheduled send time',
                    'placeholder' => 'es: 14:30']],
            'description' => ''],
=======
                    'tooltip' => 'Invia subito la notifica',
                ],
                'scheduled' => [
                    'label' => 'Programmata',
                    'tooltip' => 'Programma l\'invio per una data specifica',
                ],
                'date' => [
                    'label' => 'Data',
                    'tooltip' => 'Data di invio programmato',
                    'placeholder' => 'es: 01/01/2024',
                ],
                'time' => [
                    'label' => 'Ora',
                    'tooltip' => 'Ora di invio programmato',
                    'placeholder' => 'es: 14:30',
                ],
            ],
            'description' => '',
        ],
>>>>>>> .merge_file_nQ9ms0
        'applyFilters' => [
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
        'mark_as_read' => [
            'label' => 'Segna come letta',
<<<<<<< .merge_file_eQdHK5
            'tooltip' => 'Mark the notification as read',
            'success_message' => 'Notification marked as read',
            'error_message' => 'Error marking the notification as read'],
        'mark_as_unread' => [
            'label' => 'Mark as unread',
            'tooltip' => 'Mark the notification as unread',
            'success_message' => 'Notification marked as unread',
            'error_message' => 'Error marking the notification as unread'],
        'archive' => [
            'label' => 'Archivia',
            'tooltip' => 'Archive the notification',
            'success_message' => 'Notification archived successfully',
            'error_message' => 'Error archiving the notification'],
        'unarchive' => [
            'label' => 'Ripristina',
            'tooltip' => 'Restore the archived notification',
            'success_message' => 'Notification restored successfully',
            'error_message' => 'Error restoring the notification'],
        'send' => [
            'label' => 'Send',
            'tooltip' => 'Send the notification',
            'success_message' => 'Notification sent successfully',
            'error_message' => 'Error sending the notification'],
        'resend' => [
            'label' => 'Send again',
            'tooltip' => 'Send the notification again',
            'success_message' => 'Notification sent again successfully',
            'error_message' => 'Error sending the notification'],
        'delete' => [
            'label' => 'Delete',
            'tooltip' => 'Permanently delete the notification',
            'success_message' => 'Notification deleted successfully',
            'error_message' => 'Error deleting the notification',
            'confirmation' => 'Are you sure you want to delete this notification? This action cannot be undone.']],
=======
            'tooltip' => 'Marca la notifica come letta',
            'success_message' => 'Notifica segnata come letta',
            'error_message' => 'Errore nel segnare la notifica come letta',
        ],
        'mark_as_unread' => [
            'label' => 'Segna come non letta',
            'tooltip' => 'Marca la notifica come non letta',
            'success_message' => 'Notifica segnata come non letta',
            'error_message' => 'Errore nel segnare la notifica come non letta',
        ],
        'archive' => [
            'label' => 'Archivia',
            'tooltip' => 'Archivia la notifica',
            'success_message' => 'Notifica archiviata con successo',
            'error_message' => 'Errore nell\'archiviazione della notifica',
        ],
        'unarchive' => [
            'label' => 'Ripristina',
            'tooltip' => 'Ripristina la notifica archiviata',
            'success_message' => 'Notifica ripristinata con successo',
            'error_message' => 'Errore nel ripristino della notifica',
        ],
        'send' => [
            'label' => 'Invia',
            'tooltip' => 'Invia la notifica',
            'success_message' => 'Notifica inviata con successo',
            'error_message' => 'Errore nell\'invio della notifica',
        ],
        'resend' => [
            'label' => 'Invia nuovamente',
            'tooltip' => 'Invia nuovamente la notifica',
            'success_message' => 'Notifica inviata nuovamente con successo',
            'error_message' => 'Errore nell\'invio della notifica',
        ],
        'delete' => [
            'label' => 'Elimina',
            'tooltip' => 'Elimina definitivamente la notifica',
            'success_message' => 'Notifica eliminata con successo',
            'error_message' => 'Errore nell\'eliminazione della notifica',
            'confirmation' => 'Sei sicuro di voler eliminare questa notifica? Questa azione non può essere annullata.',
        ],
    ],
>>>>>>> .merge_file_nQ9ms0
    'messages' => [
        'no_notifications' => 'Non hai notifiche',
        'all_read' => 'All notifications have been read',
        'mark_all_read' => 'Segna tutte come lette',
<<<<<<< .merge_file_eQdHK5
        'notification_sent' => 'Notification sent successfully',
        'notification_error' => 'An error occurred while sending the notification',
        'delete_confirmation' => 'Are you sure you want to delete this notification?',
        'batch_action_confirmation' => 'Are you sure you want to perform this action on all selected notifications?',
        'success' => 'Operation completed successfully',
        'error' => 'An error occurred during the operation'],
=======
        'notification_sent' => 'Notifica inviata con successo',
        'notification_error' => 'Si è verificato un errore durante l\'invio della notifica',
        'delete_confirmation' => 'Sei sicuro di voler eliminare questa notifica?',
        'batch_action_confirmation' => 'Sei sicuro di voler eseguire questa azione su tutte le notifiche selezionate?',
        'success' => 'Operazione completata con successo',
        'error' => 'Si è verificato un errore durante l\'operazione',
    ],
>>>>>>> .merge_file_nQ9ms0
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
];
