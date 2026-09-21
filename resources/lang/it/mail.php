<?php

declare(strict_types=1);

return [
    'template' => [
        'navigation' => [
            'label' => 'Template Email',
            'plural' => 'Template Email',
            'singular' => 'Template Email',
            'group' => 'Notifiche',
<<<<<<< HEAD
            'icon' => 'heroicon-o-envelope'],
=======
            'icon' => 'heroicon-o-envelope',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'fields' => [
            'name' => [
                'label' => 'Nome',
                'placeholder' => 'Inserisci il nome del template',
<<<<<<< HEAD
                'tooltip' => 'Nome identificativo del template'],
            'code' => [
                'label' => 'Codice',
                'placeholder' => 'Inserisci il codice del template',
                'tooltip' => 'Codice univoco del template'],
            'description' => [
                'label' => 'Descrizione',
                'placeholder' => 'Inserisci una descrizione',
                'tooltip' => 'Descrizione dettagliata del template'],
            'subject' => [
                'label' => 'Oggetto',
                'placeholder' => 'Inserisci l\'oggetto dell\'email',
                'tooltip' => 'Oggetto dell\'email'],
            'body_html' => [
                'label' => 'Corpo HTML',
                'placeholder' => 'Inserisci il contenuto HTML',
                'tooltip' => 'Contenuto HTML dell\'email'],
            'body_text' => [
                'label' => 'Corpo Testo',
                'placeholder' => 'Inserisci il contenuto testuale',
                'tooltip' => 'Contenuto testuale dell\'email'],
=======
                'tooltip' => 'Nome identificativo del template',
            ],
            'code' => [
                'label' => 'Codice',
                'placeholder' => 'Inserisci il codice del template',
                'tooltip' => 'Codice univoco del template',
            ],
            'description' => [
                'label' => 'Descrizione',
                'placeholder' => 'Inserisci una descrizione',
                'tooltip' => 'Descrizione dettagliata del template',
            ],
            'subject' => [
                'label' => 'Oggetto',
                'placeholder' => 'Inserisci l\'oggetto dell\'email',
                'tooltip' => 'Oggetto dell\'email',
            ],
            'body_html' => [
                'label' => 'Corpo HTML',
                'placeholder' => 'Inserisci il contenuto HTML',
                'tooltip' => 'Contenuto HTML dell\'email',
            ],
            'body_text' => [
                'label' => 'Corpo Testo',
                'placeholder' => 'Inserisci il contenuto testuale',
                'tooltip' => 'Contenuto testuale dell\'email',
            ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
            'channels' => [
                'label' => 'Canali',
                'placeholder' => 'Seleziona i canali',
                'tooltip' => 'Canali di invio disponibili',
                'options' => [
                    'email' => [
<<<<<<< HEAD
                        'label' => 'Email'],
                    'sms' => [
                        'label' => 'SMS'],
                    'push' => [
                        'label' => 'Push Notification'],
                    'whatsapp' => [
                        'label' => 'WhatsApp'],
                    'telegram' => [
                        'label' => 'Telegram']]],
            'variables' => [
                'label' => 'Variabili',
                'placeholder' => 'Aggiungi variabili',
                'tooltip' => 'Variabili disponibili nel template'],
            'conditions' => [
                'label' => 'Condizioni',
                'placeholder' => 'Aggiungi condizioni',
                'tooltip' => 'Condizioni di invio'],
            'preview_data' => [
                'label' => 'Dati Anteprima',
                'placeholder' => 'Aggiungi dati per l\'anteprima',
                'tooltip' => 'Dati per testare il template'],
            'category' => [
                'label' => 'Categoria',
                'placeholder' => 'Inserisci la categoria',
                'tooltip' => 'Categoria del template'],
            'is_active' => [
                'label' => 'Attivo',
                'tooltip' => 'Stato di attivazione del template']],
=======
                        'label' => 'Email',
                    ],
                    'sms' => [
                        'label' => 'SMS',
                    ],
                    'push' => [
                        'label' => 'Push Notification',
                    ],
                    'whatsapp' => [
                        'label' => 'WhatsApp',
                    ],
                    'telegram' => [
                        'label' => 'Telegram',
                    ],
                ],
            ],
            'variables' => [
                'label' => 'Variabili',
                'placeholder' => 'Aggiungi variabili',
                'tooltip' => 'Variabili disponibili nel template',
            ],
            'conditions' => [
                'label' => 'Condizioni',
                'placeholder' => 'Aggiungi condizioni',
                'tooltip' => 'Condizioni di invio',
            ],
            'preview_data' => [
                'label' => 'Dati Anteprima',
                'placeholder' => 'Aggiungi dati per l\'anteprima',
                'tooltip' => 'Dati per testare il template',
            ],
            'category' => [
                'label' => 'Categoria',
                'placeholder' => 'Inserisci la categoria',
                'tooltip' => 'Categoria del template',
            ],
            'is_active' => [
                'label' => 'Attivo',
                'tooltip' => 'Stato di attivazione del template',
            ],
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'filters' => [
            'category' => [
                'label' => 'Categoria',
                'options' => [
                    'welcome' => [
<<<<<<< HEAD
                        'label' => 'Benvenuto'],
                    'reminder' => [
                        'label' => 'Promemoria'],
                    'notification' => [
                        'label' => 'Notifica']]],
=======
                        'label' => 'Benvenuto',
                    ],
                    'reminder' => [
                        'label' => 'Promemoria',
                    ],
                    'notification' => [
                        'label' => 'Notifica',
                    ],
                ],
            ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
            'is_active' => [
                'label' => 'Stato',
                'options' => [
                    'active' => [
<<<<<<< HEAD
                        'label' => 'Attivo'],
                    'inactive' => [
                        'label' => 'Inattivo']]]],
=======
                        'label' => 'Attivo',
                    ],
                    'inactive' => [
                        'label' => 'Inattivo',
                    ],
                ],
            ],
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'actions' => [
            'edit' => [
                'label' => 'Modifica',
                'icon' => 'heroicon-o-pencil',
<<<<<<< HEAD
                'color' => 'primary'],
            'delete' => [
                'label' => 'Elimina',
                'icon' => 'heroicon-o-trash',
                'color' => 'danger'],
            'preview' => [
                'label' => 'Anteprima',
                'icon' => 'heroicon-o-eye',
                'color' => 'success']],
=======
                'color' => 'primary',
            ],
            'delete' => [
                'label' => 'Elimina',
                'icon' => 'heroicon-o-trash',
                'color' => 'danger',
            ],
            'preview' => [
                'label' => 'Anteprima',
                'icon' => 'heroicon-o-eye',
                'color' => 'success',
            ],
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'preview' => [
            'title' => 'Anteprima Template',
            'subject' => 'Oggetto',
            'body_html' => 'Contenuto HTML',
            'body_text' => 'Contenuto Testuale',
            'variables' => 'Variabili',
            'actions' => [
                'back' => [
                    'label' => 'Torna indietro',
                    'icon' => 'heroicon-o-arrow-left',
<<<<<<< HEAD
                    'color' => 'secondary']]]],
=======
                    'color' => 'secondary',
                ],
            ],
        ],
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'navigation' => [
        'label' => 'Missing Navigation Label',
        'plural_label' => 'Missing Navigation Plural Label',
        'group' => 'Missing Group',
        'icon' => 'heroicon-o-puzzle-piece',
<<<<<<< HEAD
        'sort' => 100],
=======
        'sort' => 100,
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
    'fields' => [
    ],
    'actions' => [
<<<<<<< HEAD
    ]];
=======
    ],
];
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
