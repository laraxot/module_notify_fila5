<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Configurazione Comune
    |--------------------------------------------------------------------------
    |
    | Configurazione per il tema comunale e le informazioni del comune
    |
    */

    'nome' => env('COMUNE_NOME', 'Nome Comune'),
    'codice_istat' => env('COMUNE_CODICE_ISTAT', '000000'),
    'cap' => env('COMUNE_CAP', '00000'),
    'provincia' => env('COMUNE_PROVINCIA', 'Provincia'),
    'regione' => env('COMUNE_REGIONE', 'Regione'),
    'sindaco' => env('COMUNE_SINDACO', 'Nome Sindaco'),
    'indirizzo' => env('COMUNE_INDIRIZZO', 'Via, 1'),
    'telefono' => env('COMUNE_TELEFONO', '000-0000000'),
    'email' => env('COMUNE_EMAIL', 'info@comune.it'),
    'pec' => env('COMUNE_PEC', 'comune@pec.it'),
    'piva' => env('COMUNE_PIVA', '00000000000'),
    'cf' => env('COMUNE_CF', '00000000000'),
    'lat' => env('COMUNE_LAT', '45.4642'),
    'lng' => env('COMUNE_LNG', '9.1900'),
    'logo' => env('COMUNE_LOGO', '/images/logo-comune.png'),

    'colori' => [
        'primario' => env('COMUNE_COLORE_PRIMARIO', '#0066cc'),
        'secondario' => env('COMUNE_COLORE_SECONDARIO', '#00cc66'),
        'accento' => env('COMUNE_COLORE_ACCENTO', '#ff6600'),
    ],

    'social' => [
        'facebook' => env('COMUNE_FACEBOOK', ''),
        'twitter' => env('COMUNE_TWITTER', ''),
        'instagram' => env('COMUNE_INSTAGRAM', ''),
        'youtube' => env('COMUNE_YOUTUBE', ''),
    ],

    'orari' => [
        'lunedi_venerdi' => '8:30 - 12:30',
        'martedi_giovedi' => '14:30 - 16:30',
        'sabato' => '8:30 - 12:30',
        'domenica' => 'Chiuso',
    ],

    'servizi' => [
        'anagrafe' => [
            'nome' => 'Anagrafe',
            'descrizione' => 'Servizi anagrafici e stato civile',
            'icona' => 'user',
            'attivo' => true,
        ],
        'tributi' => [
            'nome' => 'Tributi',
            'descrizione' => 'Pagamento tasse e tributi comunali',
            'icona' => 'credit-card',
            'attivo' => true,
        ],
        'urbanistica' => [
            'nome' => 'Urbanistica',
            'descrizione' => 'Pratiche edilizie e urbanistiche',
            'icona' => 'building',
            'attivo' => true,
        ],
        'sociale' => [
            'nome' => 'Sociale',
            'descrizione' => 'Servizi sociali e assistenziali',
            'icona' => 'heart',
            'attivo' => true,
        ],
        'cultura' => [
            'nome' => 'Cultura',
            'descrizione' => 'Eventi culturali e biblioteca',
            'icona' => 'book',
            'attivo' => true,
        ],
        'ambiente' => [
            'nome' => 'Ambiente',
            'descrizione' => 'Servizi ambientali e rifiuti',
            'icona' => 'leaf',
            'attivo' => true,
        ],
    ],
];





