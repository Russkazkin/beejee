<?php


use app\engine\Request;
use app\engine\Session;
use app\engine\Db;
use app\engine\Authentication;
use app\models\repositories\TaskRepository;

return [
    'root_dir' => __DIR__ . "/../",
    'templates_dir' => __DIR__ . "/../twig/",
    'vendor_dir' => __DIR__ . "/../vendor/",
    'controllers_namespaces' => 'app\controllers\\',
    'salt' => 'Joon2eeshoogh1oo',
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
        'authentication' => [
            'class' => Authentication::class
        ],
        'taskRepository' => [
            'class' => TaskRepository::class
        ],
    ]
];