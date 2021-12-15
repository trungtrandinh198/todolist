<?php

return [
    'database' => [
        'driver'   => 'mysql',
        'name'     => env('DB_DATABASE'),
        'username' => env('DB_USERNAME'),
        'password' => env('DB_PASSWORD'),
        'hostname' => env('DB_HOST'),
        'port'     => env('DB_PORT'),
        'options'  => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        ],
    ],

];
