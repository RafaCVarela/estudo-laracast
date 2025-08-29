<?php

use Core\Database;
use Core\App;
use Core\Validator;


$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
// validar entradas
if (!Validator::validateEmail($email)){
    $errors['email'] = 'Email inválido. Por favor, insira um email válido.';
}

if (!Validator::validateString($password, 7, 255)){
    $errors['password'] = 'Senha inválida. Por favor, insira uma senha válida.';
}

if (!empty($errors)) {
    return view('sessions/create', [
        'errors' => $errors
    ]);
}


$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->fetch();


if ($user) {
    if (password_verify($password, $user['password'])) {
        login([
            'email' => $email
        ]);

        header('Location: /');
        exit();
    }
}


return view('sessions/create', [
    'errors' => [
        'email' => 'Sem correspondência de email ou senha.'
    ]
]);
