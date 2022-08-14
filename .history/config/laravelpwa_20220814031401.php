<?php

return [
    'name' => application('name'),
    'manifest' => [
        'name' => application('name'),
        'short_name' => application('alias'),
        'start_url' => '/',
        "theme_color": "#f69435",
        "background_color": "#9F0E7F",
        'display' => 'standalone',
        'orientation'=> 'any',
        'status_bar'=> 'black',
        'icons' => [
            '192x192' => [
                'path' => '/images/favicons/android-chrome-192x192.png',
                'purpose' => 'any'
            ],
            '512x512' => [
                'path' => '/images/favicons/android-chrome-512x512.png',
                'purpose' => 'any'
            ],
        ],
        'splash' => [
            '640x1136' => '/images/favicons/android-chrome-512x512.png',
            '750x1334' => '/images/favicons/android-chrome-512x512.png',
            '828x1792' => '/images/favicons/android-chrome-512x512.png',
            '1125x2436' => '/images/favicons/android-chrome-512x512.png',
            '1242x2208' => '/images/favicons/android-chrome-512x512.png',
            '1242x2688' => '/images/favicons/android-chrome-512x512.png',
            '1536x2048' => '/images/favicons/android-chrome-512x512.png',
            '1668x2224' => '/images/favicons/android-chrome-512x512.png',
            '1668x2388' => '/images/favicons/android-chrome-512x512.png',
            '2048x2732' => '/images/favicons/android-chrome-512x512.png',
        ],
        'shortcuts' => [
            [
                'name' => application('name'),
                'description' => application('description'),
                'url' => '/',
                'favicons' => [
                    "src" => "/images/favicons/icon-72x72.png",
                    "purpose" => "any"
                ]
            ],
            [
                'name' => application('name'),
                'description' => 'Shortcut Link 2 Description',
                'url' => '/'
            ]
        ],
        'custom' => []
    ]
];