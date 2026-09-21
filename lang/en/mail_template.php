<?php

declare(strict_types=1);

return [
    'navigation' => [
        'group' => [
            'name' => 'Notifiche',
<<<<<<< HEAD
            'description' => 'Gestione delle notifiche email e dei relativi template'],
=======
            'description' => 'Gestione delle notifiche email e dei relativi template',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'label' => 'Email Templates',
        'plural' => 'Email Templates',
        'singular' => 'Email Template',
        'icon' => 'heroicon-o-envelope',
        'sort' => '1',
<<<<<<< HEAD
        'name' => 'Template Email'],
=======
        'name' => 'Template Email',
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'fields' => [
        'id' => [
            'label' => 'ID',
            'helper_text' => 'Identificativo univoco del template',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'mailable' => [
            'label' => 'Mailable Class',
            'placeholder' => 'Enter the Mailable class name',
            'help' => 'The PHP class that handles email sending',
            'helper_text' => 'Classe PHP che gestisce l\'invio dell\'email',
            'description' => 'mailable',
<<<<<<< HEAD
            'tooltip' => ''],
=======
            'tooltip' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'subject' => [
            'label' => 'Subject',
            'placeholder' => 'Enter the email subject',
            'help' => 'The subject that will appear in the email',
            'helper_text' => 'Oggetto dell\'email',
            'description' => 'subject',
<<<<<<< HEAD
            'tooltip' => ''],
=======
            'tooltip' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'html_template' => [
            'label' => 'HTML Content',
            'placeholder' => 'Enter the email HTML content',
            'help' => 'The email content in HTML format',
            'helper_text' => 'Contenuto HTML del template email',
            'description' => 'html_template',
<<<<<<< HEAD
            'tooltip' => ''],
=======
            'tooltip' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'text_template' => [
            'label' => 'Text Content',
            'placeholder' => 'Enter the email text content',
            'help' => 'Text version of the email for clients that don\'t support HTML',
            'helper_text' => 'Versione testuale del template email',
            'description' => 'text_template',
<<<<<<< HEAD
            'tooltip' => ''],
=======
            'tooltip' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'version' => [
            'label' => 'Version',
            'help' => 'Template version number',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'created_at' => [
            'label' => 'Created At',
            'helper_text' => 'Data di creazione del template',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'updated_at' => [
            'label' => 'Last Modified',
            'helper_text' => 'Data dell\'ultima modifica del template',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'from_email' => [
            'label' => 'Email mittente',
            'helper_text' => 'Indirizzo email del mittente',
            'placeholder' => 'noreply@example.com',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'from_name' => [
            'label' => 'Nome mittente',
            'helper_text' => 'Nome visualizzato del mittente',
            'placeholder' => 'Nome Azienda',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'variables' => [
            'label' => 'Variabili disponibili',
            'helper_text' => 'Elenco delle variabili che possono essere utilizzate nel template',
            'placeholder' => 'es: {{name}}, {{email}}',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'is_markdown' => [
            'label' => 'Usa Markdown',
            'helper_text' => 'Indica se il template utilizza la sintassi Markdown',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'status' => [
            'label' => 'Stato',
            'helper_text' => 'Stato attuale del template',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'toggleColumns' => [
            'label' => 'toggleColumns',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'reorderRecords' => [
            'label' => 'reorderRecords',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'resetFilters' => [
            'label' => 'resetFilters',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'applyFilters' => [
            'label' => 'applyFilters',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'openFilters' => [
            'label' => 'openFilters',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'layout' => [
            'label' => 'layout',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'slug' => [
            'label' => 'slug',
            'description' => 'slug',
            'helper_text' => 'slug',
            'placeholder' => 'slug',
<<<<<<< HEAD
            'tooltip' => ''],
=======
            'tooltip' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'name' => [
            'description' => 'Nome del template',
            'helper_text' => 'Nome descrittivo per identificare il template',
            'placeholder' => 'Es: Benvenuto, Conferma ordine, Reset password',
            'label' => 'Nome Template',
<<<<<<< HEAD
            'tooltip' => ''],
=======
            'tooltip' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'params' => [
            'label' => 'Parametri',
            'helper_text' => 'Inserisci i parametri separati da virgola che possono essere utilizzati nel template',
            'placeholder' => 'name, email, date, company',
            'description' => 'Parametri disponibili per il template email',
<<<<<<< HEAD
            'tooltip' => '']],
=======
            'tooltip' => '',
        ],
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'filters' => [
        'search_placeholder' => 'Search templates...',
        'version' => [
            'label' => 'Version',
<<<<<<< HEAD
            'placeholder' => 'Select version']],
=======
            'placeholder' => 'Select version',
        ],
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'actions' => [
        'create' => [
            'label' => 'New Template',
            'modal' => [
                'heading' => 'Create Email Template',
                'description' => 'Enter the details for the new email template',
<<<<<<< HEAD
                'submit' => 'Create']],
=======
                'submit' => 'Create',
            ],
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'edit' => [
            'label' => 'Edit',
            'modal' => [
                'heading' => 'Edit Email Template',
                'description' => 'Modify the email template details',
<<<<<<< HEAD
                'submit' => 'Save']],
=======
                'submit' => 'Save',
            ],
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'delete' => [
            'label' => 'Delete',
            'modal' => [
                'heading' => 'Delete Email Template',
                'description' => 'Are you sure you want to delete this template? This action cannot be undone.',
<<<<<<< HEAD
                'submit' => 'Delete']],
        'restore' => [
            'label' => 'Restore'],
=======
                'submit' => 'Delete',
            ],
        ],
        'restore' => [
            'label' => 'Restore',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'force_delete' => [
            'label' => 'Force Delete',
            'modal' => [
                'heading' => 'Force Delete Email Template',
                'description' => 'Are you sure you want to permanently delete this template? This action cannot be undone.',
<<<<<<< HEAD
                'submit' => 'Force Delete']],
=======
                'submit' => 'Force Delete',
            ],
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'new_version' => [
            'label' => 'New Version',
            'modal' => [
                'heading' => 'Create New Version',
                'description' => 'Create a new version of the email template',
<<<<<<< HEAD
                'submit' => 'Create Version']],
=======
                'submit' => 'Create Version',
            ],
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'preview' => [
            'label' => 'Anteprima',
            'tooltip' => 'Visualizza anteprima dell\'email',
            'success_message' => 'Anteprima generata con successo',
<<<<<<< HEAD
            'error_message' => 'Errore nella generazione dell\'anteprima'],
=======
            'error_message' => 'Errore nella generazione dell\'anteprima',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'test' => [
            'label' => 'Invia test',
            'tooltip' => 'Invia un\'email di test',
            'success_message' => 'Email di test inviata con successo',
<<<<<<< HEAD
            'error_message' => 'Errore nell\'invio dell\'email di test'],
=======
            'error_message' => 'Errore nell\'invio dell\'email di test',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'duplicate' => [
            'label' => 'Duplica',
            'tooltip' => 'Crea una copia del template',
            'success_message' => 'Template duplicato con successo',
<<<<<<< HEAD
            'error_message' => 'Errore nella duplicazione del template'],
=======
            'error_message' => 'Errore nella duplicazione del template',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'export' => [
            'label' => 'Esporta',
            'tooltip' => 'Esporta il template in formato JSON',
            'success_message' => 'Template esportato con successo',
<<<<<<< HEAD
            'error_message' => 'Errore nell\'esportazione del template'],
=======
            'error_message' => 'Errore nell\'esportazione del template',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'import' => [
            'label' => 'Importa',
            'tooltip' => 'Importa un template da un file JSON',
            'success_message' => 'Template importato con successo',
<<<<<<< HEAD
            'error_message' => 'Errore nell\'importazione del template']],
=======
            'error_message' => 'Errore nell\'importazione del template',
        ],
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'messages' => [
        'created' => 'Email template created successfully.',
        'updated' => 'Email template updated successfully.',
        'deleted' => 'Email template deleted successfully.',
        'restored' => 'Email template restored successfully.',
        'force_deleted' => 'Email template permanently deleted.',
        'version_created' => 'New template version created successfully.',
        'success' => 'Operazione completata con successo',
        'error' => 'Si è verificato un errore durante l\'operazione',
        'confirmation' => 'Sei sicuro di voler procedere con questa operazione?',
        'template_created' => 'Il template email è stato creato con successo',
        'template_updated' => 'Il template email è stato aggiornato con successo',
<<<<<<< HEAD
        'template_deleted' => 'Il template email è stato eliminato con successo'],
    'sections' => [
        'template' => [
            'label' => 'Template',
            'description' => 'Main template information'],
        'versions' => [
            'label' => 'Versions',
            'description' => 'Template version history'],
        'logs' => [
            'label' => 'Logs',
            'description' => 'Template sending history'],
=======
        'template_deleted' => 'Il template email è stato eliminato con successo',
    ],
    'sections' => [
        'template' => [
            'label' => 'Template',
            'description' => 'Main template information',
        ],
        'versions' => [
            'label' => 'Versions',
            'description' => 'Template version history',
        ],
        'logs' => [
            'label' => 'Logs',
            'description' => 'Template sending history',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'main' => 'Informazioni Principali',
        'content' => 'Contenuto',
        'styling' => 'Stile',
        'settings' => 'Impostazioni',
<<<<<<< HEAD
        'variables' => 'Variabili'],
    'resource' => [
        'name' => 'Template Email',
        'plural' => 'Template Email'],
=======
        'variables' => 'Variabili',
    ],
    'resource' => [
        'name' => 'Template Email',
        'plural' => 'Template Email',
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'status' => [
        'sent' => 'Inviata',
        'delivered' => 'Consegnata',
        'failed' => 'Fallita',
        'opened' => 'Aperta',
        'clicked' => 'Cliccata',
        'bounced' => 'Respinta',
<<<<<<< HEAD
        'spam' => 'Segnalata come spam'],
    'model' => [
        'label' => 'mail template.model'],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label'];
=======
        'spam' => 'Segnalata come spam',
    ],
    'model' => [
        'label' => 'mail template.model',
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
];
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
