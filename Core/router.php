<?php

use Core\Response;

$routes = require basePath('routes');


function routeToController ($uri, $routes){
    if (array_key_exists($uri, $routes)){
        require basePath($routes[$uri]);
    }
    else {
        abort();
    }
}

function abort ($errorCode = Response::HTTP_NOT_FOUND) {
    
    $error = [
        Response::HTTP_NOT_FOUND => 'views/404',
        Response::HTTP_FORBIDDEN => 'views/403',
        // Response::HTTP_NOT_AUTHORIZED => 'views/401.php',
        // Response::HTTP_NOT_ALLOWED => 'views/405.php'
    ];

    if (array_key_exists($errorCode, $error)){
        require $error[$errorCode];
    }

    die();
}


$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

routeToController($uri, $routes);