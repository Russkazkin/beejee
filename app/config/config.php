<?php


use app\engine\Request;
use app\engine\Session;
use app\engine\Db;
use app\models\repositories\TaskRepository;

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
        'session' => [
            'class' => Session::class
        ],
        'taskRepository' => [
            'class' => TaskRepository::class
        ],
    ]
];