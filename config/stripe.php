<?php

return [
    'api_keys' => [
        'key' => env('STRIPE_KEY', null),
        'secret_key' => env('STRIPE_SECRET', null)
    ]

];
