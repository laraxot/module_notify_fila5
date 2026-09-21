<?php

declare(strict_types=1);

return [
    'navigation' => [
        'group' => 'Sistema',
        'label' => 'Contatti Notifiche',
        'icon' => 'notify-contacts-animated',
        'sort' => '49',
<<<<<<< HEAD
        'description' => 'Gestione dei contatti per l\'invio delle notifiche'],
=======
        'description' => 'Gestione dei contatti per l\'invio delle notifiche',
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'fields' => [
        'name' => [
            'label' => 'Nome',
            'tooltip' => 'Nome del contatto',
            'placeholder' => 'es: Mario Rossi',
            'help' => 'Inserisci il nome completo del contatto',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'email' => [
            'label' => 'Email',
            'tooltip' => 'Indirizzo email del contatto',
            'placeholder' => 'es: mario.rossi@example.com',
            'help' => 'Inserisci un indirizzo email valido',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'phone' => [
            'label' => 'Telefono',
            'tooltip' => 'Numero di telefono del contatto',
            'placeholder' => 'es: +39 123 456 7890',
            'help' => 'Inserisci il numero con prefisso internazionale',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'telegram_chat_id' => [
            'label' => 'Chat ID Telegram',
            'tooltip' => 'ID della chat Telegram del contatto',
            'placeholder' => 'es: 123456789',
            'help' => 'ID numerico fornito dal bot Telegram',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'group' => [
            'label' => 'Gruppo',
            'tooltip' => 'Gruppo di appartenenza del contatto',
            'placeholder' => 'es: Amministrazione',
            'help' => 'Organizza i contatti in gruppi per facilitarne la gestione',
            'options' => [
                'admin' => [
                    'label' => 'Amministratori',
<<<<<<< HEAD
                    'tooltip' => 'Staff amministrativo'],
                'users' => [
                    'label' => 'Utenti',
                    'tooltip' => 'Utenti standard'],
                'support' => [
                    'label' => 'Supporto',
                    'tooltip' => 'Team di supporto']],
            'helper_text' => '',
            'description' => ''],
=======
                    'tooltip' => 'Staff amministrativo',
                ],
                'users' => [
                    'label' => 'Utenti',
                    'tooltip' => 'Utenti standard',
                ],
                'support' => [
                    'label' => 'Supporto',
                    'tooltip' => 'Team di supporto',
                ],
            ],
            'helper_text' => '',
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'channels' => [
            'label' => 'Canali',
            'tooltip' => 'Canali di notifica preferiti',
            'help' => 'Seleziona i canali attraverso cui il contatto desidera ricevere le notifiche',
            'options' => [
                'email' => [
                    'label' => 'Email',
<<<<<<< HEAD
                    'tooltip' => 'Notifiche via email'],
                'sms' => [
                    'label' => 'SMS',
                    'tooltip' => 'Notifiche via SMS'],
                'telegram' => [
                    'label' => 'Telegram',
                    'tooltip' => 'Notifiche via Telegram'],
                'push' => [
                    'label' => 'Push',
                    'tooltip' => 'Notifiche push sul browser']],
            'helper_text' => '',
            'description' => ''],
=======
                    'tooltip' => 'Notifiche via email',
                ],
                'sms' => [
                    'label' => 'SMS',
                    'tooltip' => 'Notifiche via SMS',
                ],
                'telegram' => [
                    'label' => 'Telegram',
                    'tooltip' => 'Notifiche via Telegram',
                ],
                'push' => [
                    'label' => 'Push',
                    'tooltip' => 'Notifiche push sul browser',
                ],
            ],
            'helper_text' => '',
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'preferences' => [
            'label' => 'Preferenze',
            'tooltip' => 'Preferenze di notifica',
            'help' => 'Configura le preferenze per le notifiche',
            'options' => [
                'frequency' => [
                    'label' => 'Frequenza',
                    'tooltip' => 'Frequenza di invio delle notifiche',
                    'options' => [
                        'immediate' => [
                            'label' => 'Immediata',
<<<<<<< HEAD
                            'tooltip' => 'Invia le notifiche immediatamente'],
                        'daily' => [
                            'label' => 'Giornaliera',
                            'tooltip' => 'Raggruppa le notifiche in un digest giornaliero'],
                        'weekly' => [
                            'label' => 'Settimanale',
                            'tooltip' => 'Raggruppa le notifiche in un digest settimanale']]],
                'quiet_hours' => [
                    'label' => 'Ore di silenzio',
                    'tooltip' => 'Periodo in cui non inviare notifiche',
                    'help' => 'Le notifiche verranno inviate al termine del periodo di silenzio']],
            'helper_text' => '',
            'description' => ''],
=======
                            'tooltip' => 'Invia le notifiche immediatamente',
                        ],
                        'daily' => [
                            'label' => 'Giornaliera',
                            'tooltip' => 'Raggruppa le notifiche in un digest giornaliero',
                        ],
                        'weekly' => [
                            'label' => 'Settimanale',
                            'tooltip' => 'Raggruppa le notifiche in un digest settimanale',
                        ],
                    ],
                ],
                'quiet_hours' => [
                    'label' => 'Ore di silenzio',
                    'tooltip' => 'Periodo in cui non inviare notifiche',
                    'help' => 'Le notifiche verranno inviate al termine del periodo di silenzio',
                ],
            ],
            'helper_text' => '',
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'is_active' => [
            'label' => 'Attivo',
            'tooltip' => 'Stato di attivazione del contatto',
            'help' => 'Disattiva temporaneamente l\'invio di notifiche a questo contatto',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'last_notified_at' => [
            'label' => 'Ultima notifica',
            'tooltip' => 'Data e ora dell\'ultima notifica inviata',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => '']],
=======
            'description' => '',
        ],
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'actions' => [
        'test_notification' => [
            'label' => 'Invia test',
            'tooltip' => 'Invia una notifica di test al contatto',
            'icon' => 'heroicon-o-paper-airplane',
            'color' => 'primary',
            'confirmation' => [
                'title' => 'Conferma invio test',
                'message' => 'Vuoi inviare una notifica di test a questo contatto?',
                'confirm' => 'Sì, invia test',
<<<<<<< HEAD
                'cancel' => 'No, annulla']],
=======
                'cancel' => 'No, annulla',
            ],
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'import' => [
            'label' => 'Importa contatti',
            'tooltip' => 'Importa contatti da file CSV',
            'icon' => 'heroicon-o-arrow-up-tray',
<<<<<<< HEAD
            'color' => 'success'],
=======
            'color' => 'success',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'export' => [
            'label' => 'Esporta contatti',
            'tooltip' => 'Esporta contatti in CSV',
            'icon' => 'heroicon-o-arrow-down-tray',
<<<<<<< HEAD
            'color' => 'info'],
=======
            'color' => 'info',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'verify_contacts' => [
            'label' => 'Verifica contatti',
            'tooltip' => 'Verifica la validità dei contatti',
            'icon' => 'heroicon-o-check-circle',
<<<<<<< HEAD
            'color' => 'warning']],
    'messages' => [
        'test_sent' => [
            'title' => 'Test Inviato',
            'message' => 'La notifica di test è stata inviata con successo al contatto'],
        'test_failed' => [
            'title' => 'Errore Test',
            'message' => 'Impossibile inviare la notifica di test: :error'],
        'import_success' => [
            'title' => 'Importazione Completata',
            'message' => ':count contatti importati con successo'],
        'import_failed' => [
            'title' => 'Errore Importazione',
            'message' => 'Errore durante l\'importazione dei contatti: :error'],
        'export_success' => [
            'title' => 'Esportazione Completata',
            'message' => 'I contatti sono stati esportati con successo'],
        'verification_complete' => [
            'title' => 'Verifica Completata',
            'message' => 'La verifica dei contatti è stata completata. :valid validi, :invalid non validi']],
    'filters' => [
        'group' => [
            'label' => 'Gruppo',
            'tooltip' => 'Filtra per gruppo di appartenenza'],
        'channels' => [
            'label' => 'Canali',
            'tooltip' => 'Filtra per canali attivi'],
        'status' => [
            'label' => 'Stato',
            'tooltip' => 'Filtra per stato di attivazione'],
        'last_notified' => [
            'label' => 'Ultima notifica',
            'tooltip' => 'Filtra per data ultima notifica']],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label'];
=======
            'color' => 'warning',
        ],
    ],
    'messages' => [
        'test_sent' => [
            'title' => 'Test Inviato',
            'message' => 'La notifica di test è stata inviata con successo al contatto',
        ],
        'test_failed' => [
            'title' => 'Errore Test',
            'message' => 'Impossibile inviare la notifica di test: :error',
        ],
        'import_success' => [
            'title' => 'Importazione Completata',
            'message' => ':count contatti importati con successo',
        ],
        'import_failed' => [
            'title' => 'Errore Importazione',
            'message' => 'Errore durante l\'importazione dei contatti: :error',
        ],
        'export_success' => [
            'title' => 'Esportazione Completata',
            'message' => 'I contatti sono stati esportati con successo',
        ],
        'verification_complete' => [
            'title' => 'Verifica Completata',
            'message' => 'La verifica dei contatti è stata completata. :valid validi, :invalid non validi',
        ],
    ],
    'filters' => [
        'group' => [
            'label' => 'Gruppo',
            'tooltip' => 'Filtra per gruppo di appartenenza',
        ],
        'channels' => [
            'label' => 'Canali',
            'tooltip' => 'Filtra per canali attivi',
        ],
        'status' => [
            'label' => 'Stato',
            'tooltip' => 'Filtra per stato di attivazione',
        ],
        'last_notified' => [
            'label' => 'Ultima notifica',
            'tooltip' => 'Filtra per data ultima notifica',
        ],
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
];
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
