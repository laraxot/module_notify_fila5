<?php

declare(strict_types=1);

return [
<<<<<<< HEAD
    'default' => 'twilio',

    'drivers' => [
        'twilio' => [
            'account_sid' => null,
            'auth_token' => null,
            'from' => null,
        ],
        'vonage' => [
            'api_key' => null,
            'api_secret' => null,
            'from' => null,
        ],
        'facebook' => [
            'app_id' => null,
            'app_secret' => null,
            'access_token' => null,
            'phone_number_id' => null,
        ],
        '360dialog' => [
            'api_key' => null,
            'phone_number_id' => null,
        ],
    ],

    'debug' => false,
    'queue' => 'default',
    'timeout' => 30,
    'from' => null,
    'retry' => [
        'attempts' => 3,
        'delay' => 60,
    ],
    'rate_limit' => [
        'enabled' => true,
        'max_attempts' => 60,
        'decay_minutes' => 1,
=======
    /*
     * |--------------------------------------------------------------------------
     * | Default WhatsApp Driver
     * |--------------------------------------------------------------------------
     * |
     * | Supported drivers: "twilio", "vonage", "facebook", "360dialog"
     * |
     */
    'default' => env('WHATSAPP_DRIVER', 'twilio'),
    /*
     * |--------------------------------------------------------------------------
     * | WhatsApp Drivers
     * |--------------------------------------------------------------------------
     */
    'drivers' => [
        'twilio' => [
            'account_sid' => env('TWILIO_ACCOUNT_SID'),
            'auth_token' => env('TWILIO_AUTH_TOKEN'),
            'from' => env('TWILIO_WHATSAPP_FROM'),
        ],
        'vonage' => [
            'api_key' => env('VONAGE_KEY'),
            'api_secret' => env('VONAGE_SECRET'),
            'from' => env('VONAGE_WHATSAPP_FROM'),
        ],
        'facebook' => [
            'app_id' => env('FACEBOOK_APP_ID'),
            'app_secret' => env('FACEBOOK_APP_SECRET'),
            'access_token' => env('FACEBOOK_ACCESS_TOKEN'),
            'phone_number_id' => env('FACEBOOK_PHONE_NUMBER_ID'),
        ],
        '360dialog' => [
            'api_key' => env('360DIALOG_API_KEY'),
            'phone_number_id' => env('360DIALOG_PHONE_NUMBER_ID'),
        ],
    ],
    /*
     * |--------------------------------------------------------------------------
     * | Global Debug Mode
     * |--------------------------------------------------------------------------
     */
    'debug' => env('WHATSAPP_DEBUG', false),
    /*
     * |--------------------------------------------------------------------------
     * | WhatsApp Queue
     * |--------------------------------------------------------------------------
     */
    'queue' => env('WHATSAPP_QUEUE', 'default'),
    /*
     * |--------------------------------------------------------------------------
     * | Global Timeout
     * |--------------------------------------------------------------------------
     */
    'timeout' => env('WHATSAPP_TIMEOUT', 30),
    /*
     * |--------------------------------------------------------------------------
     * | Default Sender
     * |--------------------------------------------------------------------------
     */
    'from' => env('WHATSAPP_FROM'),
    /*
     * |--------------------------------------------------------------------------
     * | Retry Configuration
     * |--------------------------------------------------------------------------
     */
    'retry' => [
        'attempts' => env('WHATSAPP_RETRY_ATTEMPTS', 3),
        'delay' => env('WHATSAPP_RETRY_DELAY', 60),
    ],
    /*
     * |--------------------------------------------------------------------------
     * | Rate Limiting
     * |--------------------------------------------------------------------------
     */
    'rate_limit' => [
        'enabled' => env('WHATSAPP_RATE_LIMIT_ENABLED', true),
        'max_attempts' => env('WHATSAPP_RATE_LIMIT_MAX_ATTEMPTS', 60),
        'decay_minutes' => env('WHATSAPP_RATE_LIMIT_DECAY_MINUTES', 1),
>>>>>>> 929ed821d (.)
    ],
];
