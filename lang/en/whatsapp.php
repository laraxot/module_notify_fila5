<?php

declare(strict_types=1);

return [
    'resource' => [
        'name' => 'WhatsApp',
<<<<<<< HEAD
        'plural' => 'WhatsApp'],
=======
        'plural' => 'WhatsApp',
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'navigation' => [
        'name' => 'Send WhatsApp',
        'plural' => 'Send WhatsApp',
        'group' => [
            'name' => 'Notifications',
<<<<<<< HEAD
            'description' => 'WhatsApp notification management'],
        'label' => 'Send WhatsApp',
        'icon' => 'heroicon-o-chat-bubble-left-right',
        'sort' => '20'],
=======
            'description' => 'WhatsApp notification management',
        ],
        'label' => 'Send WhatsApp',
        'icon' => 'heroicon-o-chat-bubble-left-right',
        'sort' => '20',
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'fields' => [
        'to' => [
            'label' => 'Phone Number',
            'placeholder' => 'Enter phone number',
            'helper_text' => 'Enter phone number with international prefix (e.g. +1)',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'message' => [
            'label' => 'Message',
            'placeholder' => 'Enter message',
            'helper_text' => 'Message cannot exceed 4096 characters',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'driver' => [
            'label' => 'WhatsApp Provider',
            'placeholder' => 'Select WhatsApp provider',
            'helper_text' => 'Select the WhatsApp provider to use',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'template' => [
            'label' => 'Template',
            'placeholder' => 'Enter template name',
            'helper_text' => 'Template name (optional)',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'parameters' => [
            'label' => 'Parameters',
            'placeholder' => 'Enter parameters',
            'helper_text' => 'Parameters for the template (optional)',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'media_url' => [
            'label' => 'Media URL',
            'placeholder' => 'Enter media URL',
            'helper_text' => 'Media URL (optional)',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => ''],
=======
            'description' => '',
        ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        'media_type' => [
            'label' => 'Media Type',
            'placeholder' => 'Select media type',
            'helper_text' => 'Select the media type',
            'tooltip' => '',
<<<<<<< HEAD
            'description' => '']],
=======
            'description' => '',
        ],
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'drivers' => [
        'twilio' => 'Twilio',
        'messagebird' => 'MessageBird',
        'vonage' => 'Vonage',
<<<<<<< HEAD
        'infobip' => 'Infobip'],
=======
        'infobip' => 'Infobip',
    ],
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    'media_types' => [
        'image' => 'Image',
        'video' => 'Video',
        'document' => 'Document',
<<<<<<< HEAD
        'audio' => 'Audio'],
    'actions' => [
        'send' => 'Send WhatsApp',
        'cancel' => 'Cancel'],
    'messages' => [
        'success' => 'WhatsApp sent successfully',
        'error' => 'An error occurred while sending the WhatsApp'],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label'];
=======
        'audio' => 'Audio',
    ],
    'actions' => [
        'send' => 'Send WhatsApp',
        'cancel' => 'Cancel',
    ],
    'messages' => [
        'success' => 'WhatsApp sent successfully',
        'error' => 'An error occurred while sending the WhatsApp',
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
];
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
