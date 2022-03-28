<?php

return [
    'services' => [
        'current' => env('CURRENT_GATEWAY', 'placetopay'),
        'placetopay' => [
            'class' => \App\Bridge_ptp\PlaceToPayBridge::class,
            'settings' => [
                'login' => env('PLACETOPAY_LOGIN'),
                'tranKey' => env('PLACETOPAY_TRANKEY'),
                'baseUrl' => env('PLACETOPAY_BASE_URL')
            ]
        ],

    ]
];
