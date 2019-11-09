<?php

return [
    
    'default' => 'mysql',
    'migrations' => 'migrations',
    
    'connections' => [
        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST'),
            'port' => env('DB_PORT', 3306),
            'database' => env('DB_DATABASE'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => false,
        ],
        
        'siakad_btp' => [
            'driver' => 'mysql',
            'host' => env('DB_SIAKAD_HOST', '127.0.0.1'),
            'port' => env('DB_SIAKAD_PORT', 3306),
            'database' => env('DB_SIAKAD_BTP_DATABASE', 'siakad_btp'),
            'username' => env('DB_SIAKAD_USERNAME', 'root'),
            'password' => env('DB_SIAKAD_PASSWORD'),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => false,
        ],
        
        'siakad_iteba' => [
            'driver' => 'mysql',
            'host' => env('DB_SIAKAD_HOST', '127.0.0.1'),
            'port' => env('DB_SIAKAD_PORT', 3306),
            'database' => env('DB_SIAKAD_ITEBA_DATABASE', 'siakad_iteba'),
            'username' => env('DB_SIAKAD_USERNAME', 'root'),
            'password' => env('DB_SIAKAD_PASSWORD'),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => false,
        ],
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer set of commands than a typical key-value systems
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */
    
    'redis' => [
        
        'client' => env('REDIS_CLIENT', 'phpredis'),
        
        'cluster' => env('REDIS_CLUSTER', false),
        
        'default' => [
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => env('REDIS_DB', 0),
        ],
        
        'cache' => [
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => env('REDIS_CACHE_DB', 1),
        ],
    
    ],
];
