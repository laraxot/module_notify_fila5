<?php

use Nwidart\Modules\Activators\FileActivator;

return [
    'activators' => [
        'file' => [
            'class' => FileActivator::class,
            'statuses-file' => base_path('Modules/Tenant/data/modules_statuses.json'),
        ],
    ],
];
