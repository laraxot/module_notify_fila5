<?php

declare(strict_types=1);

return [
    'breadcrumb' => [
        'home' => ['label' => 'Home'],
        'elenco' => ['label' => 'Reports list'],
    ],
    'heading' => [
        'title' => ['label' => 'Reports list'],
        'subtitle' => ['text' => 'In the last 12 months, :count reports have been resolved.'],
    ],
    'results' => ['count' => ['text' => ':count Results']],
    'filter' => [
        'button' => ['label' => 'Filter'],
        'remove' => ['label' => 'Remove all filters'],
    ],
    'tabs' => [
        'map' => ['label' => 'Map'],
        'list' => ['label' => 'List'],
    ],
    'load-more' => ['button' => ['label' => 'Load more reports']],
    'map' => [
        'cta' => [
            'title' => ['label' => 'Submit a report'],
            'text' => ['label' => 'If you want to submit a report, you can do so after logging in with your SPID or CIE credentials.'],
            'button' => ['label' => 'Report an issue'],
        ],
        'image' => ['alt' => 'Map'],
        'pin' => ['alt' => 'Geolocation pin'],
    ],
    'card' => [
        'type' => ['label' => 'Report type'],
        'expand' => ['button' => ['label' => 'Show all']],
        'collapse' => ['button' => ['label' => 'Hide']],
        'edit' => ['link' => ['label' => 'Edit']],
        'address' => ['label' => 'Address'],
        'detail' => ['label' => 'Details'],
        'images' => ['label' => 'Images', 'alt' => 'Map image showing the issue location'],
    ],
    'filters' => ['legend' => ['label' => 'category']],
    'rating' => [
        'question' => ['text' => 'How clear is the information on this page?'],
        'legend' => ['text' => 'Rate this page from 1 to 5 stars'],
    ],
    'modal' => [
        'close' => [
            'label' => 'Close',
        ],
    ],

    'contacts' => [
        'title' => ['label' => 'Contact the municipality'],
        'faq' => ['link' => ['label' => 'Read FAQs']],
        'assistance' => ['link' => ['label' => 'Request assistance']],
        'phone' => ['link' => ['label' => 'Call toll-free number 05 0505']],
        'appointment' => ['link' => ['label' => 'Book an appointment']],
        'issues' => [
            'title' => ['label' => 'City issues'],
            'report' => ['link' => ['label' => 'Report an issue']],
        ],
    ],
];
