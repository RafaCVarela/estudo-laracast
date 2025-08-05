<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/notes' => 'controllers/notes.php',
    '/note' => 'controllers/note.php',
    '/contact' => 'controllers/contact.php'
];



function routeToController ($uri, $routes){
    if (array_key_exists($uri, $routes)){
        require $routes[$uri];
    }
    else {
        abort();
    }
}

function abort ($errorCode = Response::HTTP_NOT_FOUND) {
    
    $error = [
        Response::HTTP_NOT_FOUND => 'views/404.php',
        Response::HTTP_FORBIDDEN => 'views/403.php',
        // Response::HTTP_NOT_AUTHORIZED => 'views/401.php',
        // Response::HTTP_NOT_ALLOWED => 'views/405.php'
    ];

    if (array_key_exists($errorCode, $error)){
        require $error[$errorCode];
    }

    die();
}

routeToController($uri, $routes);