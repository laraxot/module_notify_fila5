<?php

declare(strict_types=1);

// Notify translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Notify/docs/wiki — domain i18n only.
// File: lang/it/notification_test_proxy.php
return [
    'sections' => [
        'empty' => ['label' => 'empty', 'heading' => 'empty'],
    ],
    'fields' => [
        'id' => ['label' => 'id'],
        'type' => ['label' => 'type'],
        'notifiable_type' => ['label' => 'notifiable_type'],
        'notifiable_id' => ['label' => 'notifiable_id'],
        'data' => ['label' => 'data'],
        'read_at' => ['label' => 'read_at'],
        'created_at' => ['label' => 'created_at'],
        'updated_at' => ['label' => 'updated_at'],
    ],
];
