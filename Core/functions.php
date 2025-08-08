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