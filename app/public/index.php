<?php
session_start();
$config = include __DIR__ . "/../config/config.php";
require_once $config['vendor_dir'] . 'autoload.php';

use app\engine\App;

$app = new App();
$app->test();
