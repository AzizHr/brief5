<?php

require './app/bootstrap.php';
require '../vendor/autoload.php';

use App\core\Database;
use App\core\Router;

$router = new Router;

$router->get('/posts', function () {
    new Database;
    echo 'posts here...';
});

$router->route();