<?php

return [
    'storage' => [
        'public' => [
            'disk_name' => env('AWS_PUBLIC_DISK_NAME'),
        ],
        'private' => [
            'disk_name' => env('AWS_PRIVATE_DISK_NAME'),
        ],
    ],
];
