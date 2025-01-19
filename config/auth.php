<?php

return [

    // デフォルトをusersに変更
    'defaults' => [
        'guard' => env('AUTH_GUARD', 'users'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        // ユーザ用の認証
        'users' => [
            'driver' => 'session', // セッション認証
            'provider' => 'users', // providersも "users" に合わせる
        ],

        // オーナー用の認証
        'owners' => [
            'driver' => 'session',  // セッション認証
            'provider' => 'owners', // providersも "owners" に合わせる
        ],
        // 管理者用の認証
        'admin' => [
            'driver' => 'session',  // セッション認証
            'provider' => 'admin', // providersも "admins" に合わせる
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => env('AUTH_MODEL', App\Models\User::class),
        ],

        'owners' => [
            'driver' => 'eloquent',
            'model' => env('AUTH_MODEL', App\Models\Owner::class),
        ],

        'admin' => [
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
        'owners' => [
            'provider' => 'owners',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'owner_password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
        'admin' => [ // "admins"に合わせる
            'provider' => 'admin',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'admin_password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
