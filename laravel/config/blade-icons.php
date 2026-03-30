<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Blade Icons Configuration
    |--------------------------------------------------------------------------
    |
    | Here you can configure which icon sets are available and where they
    | are located. You can also define custom icon sets.
    |
    */

    'sets' => [

        /*
        |---------------------------------------------------------------------
        | Default Icon Set
        |---------------------------------------------------------------------
        |
        | This is the default icon set that will be used when no set is
        | specified.
        |
        */

        'default' => [

            /*
            |-----------------------------------------------------------------
            | Path
            |-----------------------------------------------------------------
            |
            | The path to the icon set.
            |
            */

            'path' => 'resources/svg',

            /*
            |-----------------------------------------------------------------
            | Prefix
            |-----------------------------------------------------------------
            |
            | The prefix to use for all icons in this set.
            |
            */

            'prefix' => '',

        ],

        /*
        |---------------------------------------------------------------------
        | UI Module Brands (Automatic SVG Registration)
        |---------------------------------------------------------------------
        |
        | Icon set for UI module brand icons (social media, etc.)
        | These are automatically registered by Filament.
        |
        */

        'ui-brands' => [

            'path' => 'Modules/UI/resources/svg/brands',

            'prefix' => 'ui-brands.',

        ],

        /*
        |---------------------------------------------------------------------
        | Heroicons (Disabled - Use Filament Icons Instead)
        |---------------------------------------------------------------------
        |
        | Heroicons is now disabled. Use Filament's automatic SVG registration
        | instead by placing SVG files in resources/svg/ directories.
        |
        | To re-enable, install blade-ui-kit/blade-heroicons:
        | composer require blade-ui-kit/blade-heroicons
        |
        */

        // 'heroicons' => [
        //     'path' => resource_path('icons/heroicons'),
        //     'prefix' => 'heroicon-',
        // ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Cache Configuration
    |--------------------------------------------------------------------------
    |
    | Here you can configure caching settings for icon sets.
    |
    */

    'cache' => [

        /*
        |---------------------------------------------------------------------
        | Enabled
        |---------------------------------------------------------------------
        |
        | Whether caching is enabled.
        |
        */

        'enabled' => true,

        /*
        |---------------------------------------------------------------------
        | Duration
        |---------------------------------------------------------------------
        |
        | How long icons should be cached.
        |
        */

        'duration' => 3600,

    ],

];
