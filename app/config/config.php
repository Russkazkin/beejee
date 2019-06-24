<?php


use app\engine\Request;
use app\engine\Db;

return [
    'root_dir' => __DIR__ . "/../",
    'templates_dir' => __DIR__ . "/../twig/",
    'vendor_dir' => __DIR__ . "/../vendor/",
    'controllers_namespaces' => 'app\controllers\\',
    'components' => [
        'db' => [
            'class' => Db::class,
            'driver' => 'mysql',
            'host' => 'beejee_db',
            'login' => 'beejee',
            'password' => 'beejee',
            'database' => 'beejee',
            'charset' => 'utf8'
        ],
        'request' => [
            'class' => Request::class
        ],
        //По хорошему сделать для репозиториев отедьное простое хранилище
        //без reflection
        'basketRepository' => [
            'class' => BasketRepository::class
        ],
        'productRepository' => [
            'class' => ProductRepository::class
        ],
        'userRepository' => [
            'class' => UserRepository::class
        ]

    ]
];