<?php

use Core\Database;
use Core\App;
use Core\Authenticator;
use Http\Forms\LoginForm;


$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if ($form->validate($email, $password)) {
    if ((new Authenticator)->attempt($email, $password)) {
        redirect('/');
    }

    $form->error('email', 'No matching account found for that email address and password.');
}

return view('sessions/create', [
    'errors' => [
        'email' => 'Sem correspondência de email ou senha.'
    ]
]);


