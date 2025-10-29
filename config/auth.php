<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Authentication
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
            'provider' => 'users',
        ],

        // 👨‍✈️ Guard para choferes
        'chofer' => [
            'driver' => 'session',
            'provider' => 'choferes',
        ],

        // 🏢 Guard para empresas
        'empresa' => [
            'driver' => 'session',
            'provider' => 'empresas',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    */
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        // 👨‍✈️ Proveedor para choferes
        'choferes' => [
            'driver' => 'eloquent',
            'model' => App\Models\Chofer::class,
        ],

        // 🏢 Proveedor para empresas
        'empresas' => [
            'driver' => 'eloquent',
            'model' => App\Models\Empresa::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Reset Settings
    |--------------------------------------------------------------------------
    */
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        // 🔑 Reseteo de contraseñas para choferes
        'choferes' => [
            'provider' => 'choferes',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        // 🔑 Reseteo de contraseñas para empresas
        'empresas' => [
            'provider' => 'empresas',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Timeout
    |--------------------------------------------------------------------------
    */
    'password_timeout' => 10800,
];
