<?php

return [
    'taglines' => [
        'header' => env('HEADER_TAGLINE', ''),
        'footer' => env('FOOTER_TAGLINE', ''),
    ],


    'topics_enabled' => env('TOPICS_ENABLED', true),

    'meta' => [
        'title' => 'Web Development Personal Blog',
        'description' => 'a web developer with experience using PHP and JavaScript.',
    ],

    'about' => [
        'name' => 'Me',
        'subtitle' => 'Web Developer',
        'description' => 'I\'m a Web Developer. My experience is mostly based around PHP & Laravel, however I\'ve been becoming increasingly interested in frontend frameworks and technologies. My latest obsessions are Alpine.js and Livewire 😁',
        'meta' => [
            'title' => 'Web Development Personal Blog',
            'description' => 'is a web developer with experience using PHP and JavaScript.',
        ],
    ]
];
