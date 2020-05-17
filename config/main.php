<?php
return [
    'title' => 'My shop',
    'defaultControllerName' => 'home',

    'components' => [
        'db' => [
            'class' => \App\services\DB::class,
            'config' => [
                'driver' => 'mysql',
                'host' => 'localhost',
                'dbname' => 'shop',
                'charset' => 'UTF8',
                'username' => 'root',
                'password' => 'root',
            ]
        ],
        'twigRenderer' => [
            'class' => \App\services\renderers\TwigRenderer::class
        ],
        'request' => [
            'class' => \App\services\Request::class
        ],
        'ProductRepository' => [
            'class' => \App\repositories\ProductRepository::class
        ],
        'UserRepository' => [
            'class' => \App\repositories\UserRepository::class
        ],
        'basketServices' => [
            'class' => \App\services\BasketServices::class
        ],
        'FeedbackRepository' => [
            'class' => \App\repositories\FeedbackRepository::class
        ],
    ]
];
