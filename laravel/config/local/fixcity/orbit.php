<?php

use Modules\Tenant\Services\TenantService;

return [

    'default' => env('ORBIT_DEFAULT_DRIVER', 'md'),

    'drivers' => [
        'md' => \Orbit\Drivers\Markdown::class,
        'json' => \Orbit\Drivers\Json::class,
        'yaml' => \Orbit\Drivers\Yaml::class,
    ],

    'paths' => [
        'content' => base_path('database/content'),
        //'cache' => storage_path('framework/cache/orbit'),
        'cache' => TenantService::filePath(''),
    ],

];
