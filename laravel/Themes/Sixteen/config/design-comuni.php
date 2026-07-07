<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Design Comuni Configuration
    |--------------------------------------------------------------------------
    |
    | Configuration for Design Comuni Blade components and pages.
    | Based on Bootstrap Italia design system for Italian municipalities.
    |
    */

    /*
    |--------------------------------------------------------------------------
    | Municipality Information
    |--------------------------------------------------------------------------
    */
    
    'municipality_name' => env('DESIGN_COMUNI_MUNICIPALITY_NAME', 'Il mio Comune'),
    'tagline' => env('DESIGN_COMUNI_TAGLINE', 'Un comune da vivere'),
    
    /*
    |--------------------------------------------------------------------------
    | Region Information
    |--------------------------------------------------------------------------
    */
    
    'region_name' => env('DESIGN_COMUNI_REGION_NAME', 'Nome della Regione'),
    'region_url' => env('DESIGN_COMUNI_REGION_URL', '#'),
    
    /*
    |--------------------------------------------------------------------------
    | Logo and Branding
    |--------------------------------------------------------------------------
    */
    
    'logo_svg' => env('DESIGN_COMUNI_LOGO_SVG', null),
    'show_eu_logo' => env('DESIGN_COMUNI_SHOW_EU_LOGO', true),
    
    /*
    |--------------------------------------------------------------------------
    | Language Settings
    |--------------------------------------------------------------------------
    */
    
    'show_language_selector' => env('DESIGN_COMUNI_SHOW_LANGUAGE', true),
    'available_languages' => [
        'it' => 'Italiano',
        'en' => 'English',
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Features Toggle
    |--------------------------------------------------------------------------
    */
    
    'show_login' => env('DESIGN_COMUNI_SHOW_LOGIN', true),
    'show_search' => env('DESIGN_COMUNI_SHOW_SEARCH', true),
    'show_social' => env('DESIGN_COMUNI_SHOW_SOCIAL', true),
    'show_secondary_menu' => env('DESIGN_COMUNI_SHOW_SECONDARY_MENU', true),
    
    /*
    |--------------------------------------------------------------------------
    | Main Navigation Menu
    |--------------------------------------------------------------------------
    */
    
    'main_menu' => [
        [
            'label' => 'Amministrazione',
            'url' => 'sito.amministrazione',
            'element' => 'management',
        ],
        [
            'label' => 'Novità',
            'url' => 'sito.novita',
            'element' => 'news',
        ],
        [
            'label' => 'Servizi',
            'url' => 'sito.servizi',
            'element' => 'all-services',
        ],
        [
            'label' => 'Vivere il Comune',
            'url' => 'sito.eventi',
            'element' => 'live',
        ],
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Secondary Navigation Menu
    |--------------------------------------------------------------------------
    */
    
    'secondary_menu' => [
        ['label' => 'Iscrizioni', 'url' => 'sito.argomento'],
        ['label' => 'Estate in città', 'url' => 'sito.argomento'],
        ['label' => 'Polizia locale', 'url' => 'sito.argomento'],
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Social Media Links
    |--------------------------------------------------------------------------
    */
    
    'social' => [
        'twitter' => env('DESIGN_COMUNI_SOCIAL_TWITTER', '#'),
        'facebook' => env('DESIGN_COMUNI_SOCIAL_FACEBOOK', '#'),
        'youtube' => env('DESIGN_COMUNI_SOCIAL_YOUTUBE', '#'),
        'telegram' => env('DESIGN_COMUNI_SOCIAL_TELEGRAM', '#'),
        'whatsapp' => env('DESIGN_COMUNI_SOCIAL_WHATSAPP', '#'),
        'rss' => env('DESIGN_COMUNI_SOCIAL_RSS', '#'),
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Footer Configuration
    |--------------------------------------------------------------------------
    */
    
    'footer' => [
        
        /*
        |--------------------------------------------------------------------------
        | Municipality Address
        |--------------------------------------------------------------------------
        */
        
        'address' => env('DESIGN_COMUNI_FOOTER_ADDRESS', 
            "Comune di Nome Comune\nVia Roma 123 - 00100 Comune\nCodice fiscale / P. IVA: 00123456789"
        ),
        
        /*
        |--------------------------------------------------------------------------
        | Contact Numbers
        |--------------------------------------------------------------------------
        */
        
        'phone_toll_free' => env('DESIGN_COMUNI_PHONE_TOLL_FREE', '800 016 123'),
        'phone_mobile' => env('DESIGN_COMUNI_PHONE_MOBILE', '+39 320 1234567'),
        'phone_main' => env('DESIGN_COMUNI_PHONE_MAIN', '012 3456'),
        
        /*
        |--------------------------------------------------------------------------
        | Administration Links
        |--------------------------------------------------------------------------
        */
        
        'administration' => [
            'Organi di governo' => '#',
            'Aree amministrative' => '#',
            'Uffici' => '#',
            'Enti e fondazioni' => '#',
            'Politici' => '#',
            'Personale amministrativo' => '#',
            'Documenti e dati' => '#',
        ],
        
        /*
        |--------------------------------------------------------------------------
        | Services Categories
        |--------------------------------------------------------------------------
        */
        
        'services' => [
            'Anagrafe e stato civile' => '#',
            'Cultura e tempo libero' => '#',
            'Vita lavorativa' => '#',
            'Imprese e commercio' => '#',
            'Appalti pubblici' => '#',
            'Catasto e urbanistica' => '#',
            'Turismo' => '#',
            'Mobilità e trasporti' => '#',
            'Educazione e formazione' => '#',
            'Giustizia e sicurezza pubblica' => '#',
            'Tributi, finanze e contravvenzioni' => '#',
            'Ambiente' => '#',
            'Salute, benessere e assistenza' => '#',
            'Autorizzazioni' => '#',
            'Agricoltura e pesca' => '#',
        ],
        
        /*
        |--------------------------------------------------------------------------
        | News Links
        |--------------------------------------------------------------------------
        */
        
        'news' => [
            'Notizie' => 'sito.novita',
            'Comunicati' => 'sito.novita',
            'Avvisi' => 'sito.novita',
        ],
        
        /*
        |--------------------------------------------------------------------------
        | Living in Municipality
        |--------------------------------------------------------------------------
        */
        
        'living' => [
            'Luoghi' => '#',
            'Eventi' => 'sito.eventi',
        ],
        
        /*
        |--------------------------------------------------------------------------
        | Quick Links
        |--------------------------------------------------------------------------
        */
        
        'quick_links' => [
            'Leggi le FAQ' => 'sito.domande-frequenti',
            'Prenotazione appuntamento' => 'appuntamento.01-ufficio',
            'Segnalazione disservizio' => 'segnalazione.dettaglio',
            "Richiesta d'assistenza" => 'assistenza.01-dati',
        ],
        
        /*
        |--------------------------------------------------------------------------
        | Legal Links
        |--------------------------------------------------------------------------
        */
        
        'legal_links' => [
            'Amministrazione trasparente' => '#',
            'Informativa privacy' => 'privacy',
            'Note legali' => 'legal-notes',
            'Dichiarazione di accessibilità' => 'accessibility',
        ],
        
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Asset Paths
    |--------------------------------------------------------------------------
    */
    
    'assets_path' => 'themes/sixteen/design-comuni/assets',
    
];
