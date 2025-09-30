<?php

require './app/bootstrap.php';
require '../vendor/autoload.php';

use App\core\Database;
use App\core\Router;
use App\core\View;

$router = new Router;

$router->get('/posts', function () {
    new Database;
    echo 'posts here...';
});

$router->get('/admin/auth', function () {
    View::render('admin/auth');
});

$router->route();