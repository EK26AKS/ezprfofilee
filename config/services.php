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

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'paytm-wallet' => [
        'env' => '',
        'merchant_id' => '',
        'merchant_key' => '',
        'merchant_website' => '',
        'channel' => '',
        'industry_type' => '',
    ],

    'stripe' => [
        'key' => '',
        'secret' => '',
    ],

    'google' => [
        'client_id' => '30890069006-rmd28roee2f4js2iqa9dtub43n40s2bk.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://ezprofile.in/callback/google',
    ], 

    'facebook' => [
        'client_id' => '1512880189204836',
        'client_secret' => '6006a5f74dcfa4ae1093b98514630b33',
        'redirect' => 'https://ezprofile.in/callback/facebook',
    ], 

];
