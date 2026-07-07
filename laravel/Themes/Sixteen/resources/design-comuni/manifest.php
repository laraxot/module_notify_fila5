<?php

declare(strict_types=1);

/**
 * Design Comuni Pages Manifest
 *
 * This manifest contains metadata for all Design Comuni static pages.
 * Used for route generation, testing, and documentation.
 *
 * @see Themes/Sixteen/docs/design-comuni/README.md
 * @see Themes/Sixteen/docs/design-comuni/PAGES_INDEX.md
 */
return [
    // GENERALI (9 pagine)
    'argomenti' => [
        'title' => 'Argomenti',
        'category' => 'Generali',
        'source' => 'https://italia.github.io/design-comuni-pagine-statiche/sito/argomenti.html',
        'route' => '/it/tests/argomenti',
        'status' => 'completed',
        'created_at' => '2026-03-30',
    ],
    'homepage' => [
        'title' => 'Homepage',
        'category' => 'Generali',
        'source' => 'https://italia.github.io/design-comuni-pagine-statiche/sito/homepage.html',
        'route' => '/it/tests/homepage',
        'status' => 'completed',
        'created_at' => '2026-03-30',
    ],
    'argomento' => [
        'title' => 'Argomento',
        'category' => 'Generali',
        'source' => 'https://italia.github.io/design-comuni-pagine-statiche/sito/argomento.html',
        'route' => '/it/tests/argomento',
        'status' => 'todo',
    ],
    'domande-frequenti' => [
        'title' => 'Domande frequenti',
        'category' => 'Generali',
        'source' => 'https://italia.github.io/design-comuni-pagine-statiche/sito/domande-frequenti.html',
        'route' => '/it/tests/domande-frequenti',
        'status' => 'todo',
    ],
    'risultati-ricerca' => [
        'title' => 'Risultati di ricerca',
        'category' => 'Generali',
        'source' => 'https://italia.github.io/design-comuni-pagine-statiche/sito/risultati-ricerca.html',
        'route' => '/it/tests/risultati-ricerca',
        'status' => 'todo',
    ],
    'lista-risorse' => [
        'title' => 'Lista risorse',
        'category' => 'Generali',
        'source' => 'https://italia.github.io/design-comuni-pagine-statiche/sito/lista-risorse.html',
        'route' => '/it/tests/lista-risorse',
        'status' => 'todo',
    ],
    'lista-categorie' => [
        'title' => 'Lista categorie',
        'category' => 'Generali',
        'source' => 'https://italia.github.io/design-comuni-pagine-statiche/sito/lista-categorie.html',
        'route' => '/it/tests/lista-categorie',
        'status' => 'todo',
    ],
    'lista-risorse-categorie' => [
        'title' => 'Lista risorse e categorie',
        'category' => 'Generali',
        'source' => 'https://italia.github.io/design-comuni-pagine-statiche/sito/lista-risorse-categorie.html',
        'route' => '/it/tests/lista-risorse-categorie',
        'status' => 'todo',
    ],
    'mappa-sito' => [
        'title' => 'Mappa del sito',
        'category' => 'Generali',
        'source' => 'https://italia.github.io/design-comuni-pagine-statiche/sito/mappa-sito.html',
        'route' => '/it/tests/mappa-sito',
        'status' => 'todo',
    ],

    // AMMINISTRAZIONE (2 pagine)
    'amministrazione' => [
        'title' => 'Amministrazione',
        'category' => 'Amministrazione',
        'source' => 'https://italia.github.io/design-comuni-pagine-statiche/sito/amministrazione.html',
        'route' => '/it/tests/amministrazione',
        'status' => 'todo',
    ],
    'documenti-dati' => [
        'title' => 'Documenti e dati',
        'category' => 'Amministrazione',
        'source' => 'https://italia.github.io/design-comuni-pagine-statiche/sito/documenti-dati.html',
        'route' => '/it/tests/documenti-dati',
        'status' => 'todo',
    ],

    // NOVITÀ (2 pagine)
    'novita' => [
        'title' => 'Novità',
        'category' => 'Novità',
        'source' => 'https://italia.github.io/design-comuni-pagine-statiche/sito/novita.html',
        'route' => '/it/tests/novita',
        'status' => 'todo',
    ],
    'novita-dettaglio' => [
        'title' => 'Notizia, comunicato, avviso',
        'category' => 'Novità',
        'source' => 'https://italia.github.io/design-comuni-pagine-statiche/sito/novita-dettaglio.html',
        'route' => '/it/tests/novita-dettaglio',
        'status' => 'todo',
    ],

    // SERVIZI (3 pagine)
    'servizi' => [
        'title' => 'Servizi',
        'category' => 'Servizi',
        'source' => 'https://italia.github.io/design-comuni-pagine-statiche/sito/servizi.html',
        'route' => '/it/tests/servizi',
        'status' => 'todo',
    ],
    'servizi-categoria' => [
        'title' => 'Categoria di servizio',
        'category' => 'Servizi',
        'source' => 'https://italia.github.io/design-comuni-pagine-statiche/sito/servizi-categoria.html',
        'route' => '/it/tests/servizi-categoria',
        'status' => 'todo',
    ],
    'servizio-dettaglio' => [
        'title' => 'Scheda servizio',
        'category' => 'Servizi',
        'source' => 'https://italia.github.io/design-comuni-pagine-statiche/sito/servizio-dettaglio.html',
        'route' => '/it/tests/servizio-dettaglio',
        'status' => 'todo',
    ],

    // VIVERE IL COMUNE (2 pagine)
    'eventi' => [
        'title' => 'Eventi',
        'category' => 'Vivere il Comune',
        'source' => 'https://italia.github.io/design-comuni-pagine-statiche/sito/eventi.html',
        'route' => '/it/tests/eventi',
        'status' => 'todo',
    ],
    'evento-dettaglio' => [
        'title' => 'Evento',
        'category' => 'Vivere il Comune',
        'source' => 'https://italia.github.io/design-comuni-pagine-statiche/sito/evento-dettaglio.html',
        'route' => '/it/tests/evento-dettaglio',
        'status' => 'todo',
    ],

    // PRENOTAZIONE APPUNTAMENTO (8 pagine)
    'appuntamento-01-ufficio' => [
        'title' => 'Appuntamento 01 ufficio',
        'category' => 'Prenotazione Appuntamento',
        'source' => 'https://italia.github.io/design-comuni-pagine-statiche/sito/appuntamento-01-ufficio.html',
        'route' => '/it/tests/appuntamento-01-ufficio',
        'status' => 'todo',
    ],
    'appuntamento-01-ufficio-luogo' => [
        'title' => 'Appuntamento 01 ufficio luogo',
        'category' => 'Prenotazione Appuntamento',
        'source' => 'https://italia.github.io/design-comuni-pagine-statiche/sito/appuntamento-01-ufficio-luogo.html',
        'route' => '/it/tests/appuntamento-01-ufficio-luogo',
        'status' => 'todo',
    ],
    'appuntamento-02-data-orario' => [
        'title' => 'Appuntamento 02 data orario',
        'category' => 'Prenotazione Appuntamento',
        'source' => 'https://italia.github.io/design-comuni-pagine-statiche/sito/appuntamento-02-data-orario.html',
        'route' => '/it/tests/appuntamento-02-data-orario',
        'status' => 'todo',
    ],
    'appuntamento-03-dettagli' => [
        'title' => 'Appuntamento 03 dettagli',
        'category' => 'Prenotazione Appuntamento',
        'source' => 'https://italia.github.io/design-comuni-pagine-statiche/sito/appuntamento-03-dettagli.html',
        'route' => '/it/tests/appuntamento-03-dettagli',
        'status' => 'todo',
    ],
    'appuntamento-04-richiedente' => [
        'title' => 'Appuntamento 04 richiedente',
        'category' => 'Prenotazione Appuntamento',
        'source' => 'https://italia.github.io/design-comuni-pagine-statiche/sito/appuntamento-04-richiedente.html',
        'route' => '/it/tests/appuntamento-04-richiedente',
        'status' => 'todo',
    ],
    'appuntamento-04-richiedente-autenticato' => [
        'title' => 'Appuntamento 04 richiedente autenticato',
        'category' => 'Prenotazione Appuntamento',
        'source' => 'https://italia.github.io/design-comuni-pagine-statiche/sito/appuntamento-04-richiedente-autenticato.html',
        'route' => '/it/tests/appuntamento-04-richiedente-autenticato',
        'status' => 'todo',
    ],
    'appuntamento-05-riepilogo' => [
        'title' => 'Appuntamento 05 riepilogo',
        'category' => 'Prenotazione Appuntamento',
        'source' => 'https://italia.github.io/design-comuni-pagine-statiche/sito/appuntamento-05-riepilogo.html',
        'route' => '/it/tests/appuntamento-05-riepilogo',
        'status' => 'todo',
    ],
    'appuntamento-06-conferma' => [
        'title' => 'Appuntamento 06 conferma',
        'category' => 'Prenotazione Appuntamento',
        'source' => 'https://italia.github.io/design-comuni-pagine-statiche/sito/appuntamento-06-conferma.html',
        'route' => '/it/tests/appuntamento-06-conferma',
        'status' => 'todo',
    ],

    // RICHIESTA ASSISTENZA (2 pagine)
    'assistenza-01-dati' => [
        'title' => 'Assistenza 01 dati',
        'category' => 'Richiesta Assistenza',
        'source' => 'https://italia.github.io/design-comuni-pagine-statiche/sito/assistenza-01-dati.html',
        'route' => '/it/tests/assistenza-01-dati',
        'status' => 'todo',
    ],
    'assistenza-02-conferma' => [
        'title' => 'Assistenza 02 conferma',
        'category' => 'Richiesta Assistenza',
        'source' => 'https://italia.github.io/design-comuni-pagine-statiche/sito/assistenza-02-conferma.html',
        'route' => '/it/tests/assistenza-02-conferma',
        'status' => 'todo',
    ],

    // SEGNALAZIONE DISSERVIZIO (7 pagine)
    'segnalazione-dettaglio' => [
        'title' => 'Segnalazione dettaglio',
        'category' => 'Segnalazione Disservizio',
        'source' => 'https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazione-dettaglio.html',
        'route' => '/it/tests/segnalazione-dettaglio',
        'status' => 'todo',
    ],
    'segnalazione-01-privacy' => [
        'title' => 'Segnalazione 01 privacy',
        'category' => 'Segnalazione Disservizio',
        'source' => 'https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazione-01-privacy.html',
        'route' => '/it/tests/segnalazione-01-privacy',
        'status' => 'todo',
    ],
    'segnalazione-02-dati' => [
        'title' => 'Segnalazione 02 dati',
        'category' => 'Segnalazione Disservizio',
        'source' => 'https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazione-02-dati.html',
        'route' => '/it/tests/segnalazione-02-dati',
        'status' => 'todo',
    ],
    'segnalazione-03-riepilogo' => [
        'title' => 'Segnalazione 03 riepilogo',
        'category' => 'Segnalazione Disservizio',
        'source' => 'https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazione-03-riepilogo.html',
        'route' => '/it/tests/segnalazione-03-riepilogo',
        'status' => 'todo',
    ],
    'segnalazione-04-conferma' => [
        'title' => 'Segnalazione 04 conferma',
        'category' => 'Segnalazione Disservizio',
        'source' => 'https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazione-04-conferma.html',
        'route' => '/it/tests/segnalazione-04-conferma',
        'status' => 'todo',
    ],
    'segnalazione-area-personale' => [
        'title' => 'Segnalazione area personale',
        'category' => 'Segnalazione Disservizio',
        'source' => 'https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazione-area-personale.html',
        'route' => '/it/tests/segnalazione-area-personale',
        'status' => 'todo',
    ],
    'segnalazioni-elenco' => [
        'title' => 'Segnalazioni elenco',
        'category' => 'Segnalazione Disservizio',
        'source' => 'https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazioni-elenco.html',
        'route' => '/it/tests/segnalazioni-elenco',
        'status' => 'todo',
    ],
];
