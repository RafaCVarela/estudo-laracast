<?php


$router->get('/', 'controllers/index');
$router->get('/about', 'controllers/about');
$router->get('/contact', 'controllers/contact');

$router->get('/notes', 'controllers/notes/index');
$router->get('/note', 'controllers/notes/show');
$router->get('/notes/create', 'controllers/notes/create');
$router->post('/notes/create', 'controllers/notes/create');