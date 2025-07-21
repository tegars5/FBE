<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    */

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users', // <--- UBAH INI DARI 'admins' MENJADI 'users'
        ],
        // Jika Anda memiliki guard terpisah untuk admin, Anda bisa menambahkannya di sini
        // 'admin' => [
        //     'driver' => 'session',
        //     'provider' => 'admins',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    */

    'providers' => [
        'users' => [ // <--- PASTIКAN BLOK INI TIDAK DIKOMENTARI DAN MENUNJUK KE MODEL USER
            'driver' => 'eloquent',
            'model' => App\Models\User::class, // <--- Pastikan ini menunjuk ke App\Models\User
        ],

        'admins' => [ // Ini tetap bisa Anda pertahankan jika Anda punya sistem admin terpisah
            'driver' => 'eloquent',
            'model' => env('AUTH_MODEL', App\Models\Admin::class),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    */

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
