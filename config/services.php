<?php

return [

  'digicoders' => [
    'base_url' => env('DIGICODERS_BASE_URL'),
    'authkey' => env('DIGICODERS_AUTHKEY'),
    'template_id' => env('DIGICODERS_TEMPLATE_ID'),
    'sender' => env('DIGICODERS_SENDER'),
    'route' => env('DIGICODERS_ROUTE'),
    'country' => env('DIGICODERS_COUNTRY'),
],

   

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

];
