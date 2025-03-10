<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'paypal' => [
    'client_id' => env('ARm76ATB2OzePj2s6IavIKeQVoPEBCZySufaPv3I60M-3nfuOTZyWKAX5MzUM0NSmsePWsFtHEV3wZqC'),  // Use the environment variable for the client ID
    'secret' => env('ENQ9wcgeaT0Nqfch0alpU-ubiJbQ943GcCk33PGVO5Ault-0CAGc6mlvjLBNZzYtfbo4i8GfYl3IDVAF'),  // Use the environment variable for the secret
    'sandbox' => env('PAYPAL_MODE') === 'sandbox', // Check if the mode is 'sandbox' based on the .env file
],






];
