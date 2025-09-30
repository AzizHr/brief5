<?php

require './app/bootstrap.php';
require '../vendor/autoload.php';

use App\controllers\AdminController;
use App\core\Router;

$router = new Router;

$router->get('/admin/auth', [AdminController::class, 'showLogin']);

$router->get('/test', function () {
    echo 'Callback Function';
});

$router->route();