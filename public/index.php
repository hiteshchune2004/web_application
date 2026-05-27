<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../config/config.php';

// Autoloader
spl_autoload_register(function ($class) {
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $file = __DIR__ . '/../' . $path . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

use Core\App;
use Core\JWT;

$config = require __DIR__ . '/../config/config.php';
JWT::setSecret($config['jwt_secret']);

require_once __DIR__ . '/../config/routes.php';

$app = new App();
$app->run();
