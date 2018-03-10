<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

// socialite configration 

    'facebook' => [
        'client_id' => '437386593301257',            
        'client_secret' => 'dd4b957ca0fe875bc1f4b072581e2afe',    
        'redirect' => 'http://asolnokol.com/login/facebook/callback',      
    ],

    'twitter' => [
        'client_id' => 'DRlGv8dFHkkxT6bJghXMZUvHa',            
        'client_secret' => '7nTTB8RNShiM76Btkg814a9apkqifh4f203BOUV6D7DVSPtL0P',    
        'redirect' => 'http://asolnokol.com/login/twitter/callback',      
    ],

    'google' => [
        'client_id' => '322813641432-v5i01etqa7ovp3a0ca2rcf6adarijg2k.apps.googleusercontent.com',            
        'client_secret' => 'lTRWLdyeaHn9EDAa7KnHxJ2N',    
        'redirect' => 'http://asolnokol.com/login/google/callback',      
    ],

];
