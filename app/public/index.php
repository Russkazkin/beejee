<?php
session_start();
$config = include __DIR__ . "/../config/config.php";
require_once $config['vendor_dir'] . 'autoload.php';

use app\engine\App;

try {
    App::call()->run($config);
} catch (Exception $e) {
    var_dump($e);
}
