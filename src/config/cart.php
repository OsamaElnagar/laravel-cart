<?php

return [
    /*
     * Enable or disable logging for the package actions.
     */
    'log_enabled' => env('CART_LOG_ENABLED', false),

    /*
     * The model that represents the user.
     */
    'user_model' => \App\Models\User::class,

    /*
     * The table name for the carts.
     */
    'table_name' => 'carts',

    /*
     * Cookie settings for guest carts.
     */
    'cookie' => [
        'name' => 'cart_id',
        'lifetime' => 30 * 24 * 60, // 30 days
    ],
];
