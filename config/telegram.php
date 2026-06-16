<?php

declare(strict_types=1);

return [
<<<<<<< HEAD
    'default' => 'official',

    'drivers' => [
        'official' => [
            'token' => null,
            'api_url' => 'https://api.telegram.org',
        ],
        'botman' => [
            'token' => null,
            'api_url' => 'https://api.telegram.org',
            'webhook_url' => null,
        ],
        'nutgram' => [
            'token' => null,
            'api_url' => 'https://api.telegram.org',
            'webhook_url' => null,
            'polling' => false,
        ],
    ],

    'debug' => false,
    'queue' => 'default',
    'timeout' => 30,
    'parse_mode' => 'HTML',
    'retry' => [
        'attempts' => 3,
        'delay' => 60,
    ],
    'rate_limit' => [
        'enabled' => true,
        'max_attempts' => 30,
        'decay_minutes' => 1,
=======
    /*
     * |--------------------------------------------------------------------------
     * | Default Telegram Driver
     * |--------------------------------------------------------------------------
     * |
     * | Supported drivers: "official", "botman", "nutgram"
     * |
     */
    'default' => env('TELEGRAM_DRIVER', 'official'),
    /*
     * |--------------------------------------------------------------------------
     * | Telegram Drivers
     * |--------------------------------------------------------------------------
     */
    'drivers' => [
        'official' => [
            'token' => env('TELEGRAM_BOT_TOKEN'),
            'api_url' => env('TELEGRAM_API_URL', 'https://api.telegram.org'),
        ],
        'botman' => [
            'token' => env('TELEGRAM_BOT_TOKEN'),
            'api_url' => env('TELEGRAM_API_URL', 'https://api.telegram.org'),
            'webhook_url' => env('TELEGRAM_WEBHOOK_URL'),
        ],
        'nutgram' => [
            'token' => env('TELEGRAM_BOT_TOKEN'),
            'api_url' => env('TELEGRAM_API_URL', 'https://api.telegram.org'),
            'webhook_url' => env('TELEGRAM_WEBHOOK_URL'),
            'polling' => env('TELEGRAM_POLLING', false),
        ],
    ],
    /*
     * |--------------------------------------------------------------------------
     * | Global Debug Mode
     * |--------------------------------------------------------------------------
     */
    'debug' => env('TELEGRAM_DEBUG', false),
    /*
     * |--------------------------------------------------------------------------
     * | Telegram Queue
     * |--------------------------------------------------------------------------
     */
    'queue' => env('TELEGRAM_QUEUE', 'default'),
    /*
     * |--------------------------------------------------------------------------
     * | Global Timeout
     * |--------------------------------------------------------------------------
     */
    'timeout' => env('TELEGRAM_TIMEOUT', 30),
    /*
     * |--------------------------------------------------------------------------
     * | Default Parse Mode
     * |--------------------------------------------------------------------------
     * |
     * | Supported modes: "Markdown", "MarkdownV2", "HTML"
     * |
     */
    'parse_mode' => env('TELEGRAM_PARSE_MODE', 'HTML'),
    /*
     * |--------------------------------------------------------------------------
     * | Retry Configuration
     * |--------------------------------------------------------------------------
     */
    'retry' => [
        'attempts' => env('TELEGRAM_RETRY_ATTEMPTS', 3),
        'delay' => env('TELEGRAM_RETRY_DELAY', 60),
    ],
    /*
     * |--------------------------------------------------------------------------
     * | Rate Limiting
     * |--------------------------------------------------------------------------
     */
    'rate_limit' => [
        'enabled' => env('TELEGRAM_RATE_LIMIT_ENABLED', true),
        'max_attempts' => env('TELEGRAM_RATE_LIMIT_MAX_ATTEMPTS', 30),
        'decay_minutes' => env('TELEGRAM_RATE_LIMIT_DECAY_MINUTES', 1),
>>>>>>> 929ed821d (.)
    ],
];
