<?php

declare(strict_types=1);

return [
    'navigation' => [
        'label' => 'Invio Email',
        'group' => [
            'label' => 'Sistema',
<<<<<<< HEAD
            'description' => 'Funzionalità per l\'invio di email attraverso il sistema di notifiche'],
        'icon' => 'heroicon-o-envelope',
        'sort' => '49'],
=======
            'description' => 'Funzionalità per l\'invio di email attraverso il sistema di notifiche',
        ],
        'icon' => 'heroicon-o-envelope',
        'sort' => '49',
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'fields' => [
        'subject' => [
            'label' => 'Oggetto',
            'placeholder' => 'Inserisci l\'oggetto dell\'email',
            'help' => 'Oggetto che apparirà nell\'intestazione dell\'email',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'template_id' => [
            'label' => 'Template Email',
            'placeholder' => 'Seleziona il template email da utilizzare',
            'help' => 'Template predefinito per l\'email (opzionale)',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'to' => [
            'label' => 'Destinatario',
            'placeholder' => 'destinatario@dominio.com',
            'help' => 'Indirizzo email del destinatario',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'cc' => [
            'label' => 'Copia Conoscenza (CC)',
            'placeholder' => 'cc@dominio.com (opzionale)',
            'help' => 'Indirizzi email in copia conoscenza, separati da virgole',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'bcc' => [
            'label' => 'Copia Nascosta (BCC)',
            'placeholder' => 'bcc@dominio.com (opzionale)',
            'help' => 'Indirizzi email in copia nascosta, separati da virgole',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'content' => [
            'label' => 'Contenuto Testo',
            'placeholder' => 'Inserisci il contenuto testuale dell\'email',
            'help' => 'Contenuto testuale dell\'email (versione plain text)',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'body_html' => [
            'label' => 'Contenuto HTML',
            'placeholder' => '<h1>Titolo</h1><p>Contenuto dell\'email in formato HTML</p>',
            'help' => 'Contenuto HTML dell\'email da inviare (opzionale)',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'parameters' => [
            'label' => 'Parametri Template',
            'placeholder' => '{\\"nome\\": \\"Mario\\", \\"cognome\\": \\"Rossi\\"}',
            'help' => 'Parametri JSON per personalizzare il template selezionato',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'attachments' => [
            'label' => 'Allegati',
            'placeholder' => 'Seleziona i file da allegare',
            'help' => 'File da allegare all\'email (opzionale)',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'priority' => [
            'label' => 'Priorità',
            'placeholder' => 'Seleziona la priorità dell\'email',
            'help' => 'Priorità dell\'email (normale, alta, urgente)',
            'options' => [
                'normal' => 'Normale',
                'high' => 'Alta',
<<<<<<< HEAD
                'urgent' => 'Urgente'],
            'tooltip' => '',
            'helper_text' => '',
            'description' => '']],
=======
                'urgent' => 'Urgente',
            ],
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'actions' => [
        'send' => [
            'label' => 'Invia Email',
            'success' => 'Email inviata con successo al destinatario',
            'error' => 'Errore nell\'invio dell\'email. Verifica la configurazione.',
            'confirmation' => 'Sei sicuro di voler inviare questa email?',
<<<<<<< HEAD
            'tooltip' => 'Invia l\'email al destinatario specificato'],
=======
            'tooltip' => 'Invia l\'email al destinatario specificato',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'preview' => [
            'label' => 'Anteprima',
            'success' => 'Anteprima dell\'email generata correttamente',
            'error' => 'Errore nella generazione dell\'anteprima',
<<<<<<< HEAD
            'tooltip' => 'Visualizza l\'anteprima dell\'email prima dell\'invio'],
=======
            'tooltip' => 'Visualizza l\'anteprima dell\'email prima dell\'invio',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'save_draft' => [
            'label' => 'Salva Bozza',
            'success' => 'Bozza salvata correttamente',
            'error' => 'Errore nel salvataggio della bozza',
<<<<<<< HEAD
            'tooltip' => 'Salva l\'email come bozza per inviarla successivamente'],
=======
            'tooltip' => 'Salva l\'email come bozza per inviarla successivamente',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'schedule' => [
            'label' => 'Programma Invio',
            'success' => 'Email programmata per l\'invio',
            'error' => 'Errore nella programmazione dell\'invio',
<<<<<<< HEAD
            'tooltip' => 'Programma l\'invio dell\'email per una data e ora specifiche']],
=======
            'tooltip' => 'Programma l\'invio dell\'email per una data e ora specifiche',
        ],
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'messages' => [
        'success' => 'Email inviata con successo! Controlla la casella email del destinatario.',
        'error' => 'Si è verificato un errore durante l\'invio dell\'email. Verifica la configurazione SMTP.',
        'draft_saved' => 'Bozza salvata correttamente. Puoi recuperarla dalla sezione Bozze.',
        'scheduled' => 'Email programmata per l\'invio. Riceverai una notifica quando verrà inviata.',
        'preview_generated' => 'Anteprima generata correttamente. Controlla l\'aspetto dell\'email.',
        'invalid_template' => 'Template email non valido o non trovato.',
        'invalid_parameters' => 'Parametri del template non validi. Verifica il formato JSON.',
        'no_recipients' => 'Nessun destinatario specificato. Inserisci almeno un indirizzo email.',
<<<<<<< HEAD
        'smtp_error' => 'Errore di configurazione SMTP. Verifica le impostazioni del server.'],
=======
        'smtp_error' => 'Errore di configurazione SMTP. Verifica le impostazioni del server.',
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'validation' => [
        'subject_required' => 'Der Betreff ist erforderlich',
        'to_required' => 'Der Empfänger ist erforderlich',
        'to_valid' => 'Il destinatario deve essere un indirizzo email valido',
        'cc_valid' => 'Gli indirizzi in CC devono essere email valide',
        'bcc_valid' => 'Gli indirizzi in BCC devono essere email valide',
        'content_required' => 'Der Inhalt ist erforderlich',
        'template_exists' => 'Il template selezionato non esiste',
        'parameters_json' => 'I parametri devono essere in formato JSON valido',
<<<<<<< HEAD
        'priority_valid' => 'La priorità deve essere una delle opzioni disponibili'],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label'];
=======
        'priority_valid' => 'La priorità deve essere una delle opzioni disponibili',
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
];
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
