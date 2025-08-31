<?php

use Core\Session;
use Core\ValidationException;


session_start();

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . "Core/functions.php";


spl_autoload_register (function ($class) {

    $class = str_replace('\\', '/', $class);

    require basePath("{$class}");
});


require basePath('bootstrap');

$router = new \Core\Router();
$routes = require basePath('routes');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];


try {
    $router->route($uri, $method);
} catch (ValidationException $exception) {
    Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);

    return redirect($router->previousUrl());
}

Session::unflash();
