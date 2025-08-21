<?php


$router->get('/', 'controllers/index');
$router->get('/about', 'controllers/about');
$router->get('/contact', 'controllers/contact');

$router->get('/notes', 'controllers/notes/index');
$router->get('/note', 'controllers/notes/show');
$router->delete('/note', 'controllers/notes/destroy');


$router->get('/note/edit', 'controllers/notes/edit');
$router->patch('/note', 'controllers/notes/update');


$router->get('/notes/create', 'controllers/notes/create');
$router->post('/notes', 'controllers/notes/store');