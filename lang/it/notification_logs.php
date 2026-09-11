<?php

declare(strict_types=1);

return [
    'fields' => [
        'id' => ['label' => 'id'],
        'name' => ['label' => 'name'],
        'created_at' => ['label' => 'created_at'],
        'channel' => ['label' => 'channel'],
        'status' => ['label' => 'status'],
        'notifiable_type' => ['label' => 'notifiable_type'],
        'notifiable_id' => ['label' => 'notifiable_id'],
        'status_message' => ['label' => 'status_message'],
        'sent_at' => ['label' => 'sent_at'],
    ],
    'actions' => [
        'create' => ['label' => 'create', 'icon' => 'create', 'tooltip' => 'create'],
    ],
];
