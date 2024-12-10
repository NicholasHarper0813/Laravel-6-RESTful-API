<?php

return [
    'default' => env('FILESYSTEM_DRIVER', 'local'),
    'cloud' => env('FILESYSTEM_CLOUD', 's3'),
    'disks' => [
        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'region' => env('AWS_DEFAULT_REGION'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
        ],
    ],

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
