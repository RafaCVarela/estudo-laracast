<?php

use Core\Response;

function dd ($value)
{
    echo "<pre>";
        var_dump($value);
    echo "</pre>";

    die();
}


function urlIs ($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}


function autorize ($condition, $status = Response::HTTP_FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}


function basePath ($path)
{
    return (BASE_PATH . "/{$path}.php");
}


function view ($path, $attributes = [])
{
    extract($attributes);


    
    require basePath("views/{$path}.view");
}


function abort ($errorCode = Response::HTTP_NOT_FOUND) {
    
    $error = [
        // Response::HTTP_NOT_AUTHORIZED => view('401'),
        Response::HTTP_FORBIDDEN => basePath('views/403'),
        Response::HTTP_NOT_FOUND => basePath('views/404'),
        // Response::HTTP_NOT_ALLOWED => view('405')
    ];

    if (array_key_exists($errorCode, $error)){
        require $error[$errorCode];
    }

    die();
}