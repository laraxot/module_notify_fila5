<?php

declare(strict_types=1);

return [
    'default' => 'twilio',

    'drivers' => [
        'twilio' => [
            'account_sid' => null,
            'auth_token' => null,
<<<<<<< HEAD
            'from' => null],
        'vonage' => [
            'api_key' => null,
            'api_secret' => null,
            'from' => null],
=======
            'from' => null,
        ],
        'vonage' => [
            'api_key' => null,
            'api_secret' => null,
            'from' => null,
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'facebook' => [
            'app_id' => null,
            'app_secret' => null,
            'access_token' => null,
<<<<<<< HEAD
            'phone_number_id' => null],
        '360dialog' => [
            'api_key' => null,
            'phone_number_id' => null]],
=======
            'phone_number_id' => null,
        ],
        '360dialog' => [
            'api_key' => null,
            'phone_number_id' => null,
        ],
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

    'debug' => false,
    'queue' => 'default',
    'timeout' => 30,
    'from' => null,
    'retry' => [
        'attempts' => 3,
<<<<<<< HEAD
        'delay' => 60],
    'rate_limit' => [
        'enabled' => true,
        'max_attempts' => 60,
        'decay_minutes' => 1]];
=======
        'delay' => 60,
    ],
    'rate_limit' => [
        'enabled' => true,
        'max_attempts' => 60,
        'decay_minutes' => 1,
    ],
];
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
