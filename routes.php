<?php


$router->get('/', 'controllers/index');
$router->get('/about', 'controllers/about');
$router->get('/contact', 'controllers/contact');

$router->get('/notes', 'controllers/notes/index')->only('auth');
$router->get('/note', 'controllers/notes/show');
$router->delete('/note', 'controllers/notes/destroy');


$router->get('/note/edit', 'controllers/notes/edit');
$router->patch('/note', 'controllers/notes/update');


$router->get('/notes/create', 'controllers/notes/create');
$router->post('/notes', 'controllers/notes/store');

$router->get('/register', 'controllers/registration/create')->only('guest');
$router->post('/register', 'controllers/registration/store')->only('guest');

$router->get('/login', 'controllers/sessions/create')->only('guest');
$router->post('/sessions', 'controllers/sessions/store')->only('guest');
$router->delete('/logout', 'controllers/sessions/destroy')->only('auth');
