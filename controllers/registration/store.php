<?php

use Core\Database;
use Core\Validator;
use Core\App;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
// validar entradas
if (!Validator::validateEmail($email)){
    $errors['email'] = 'Email inválido. Por favor, insira um email válido.';
}

if (!Validator::validateString($password, 7, 255)){
    $errors['password'] = 'Senha inválida. A senha deve ter pelo menos 7 caracteres.';
}

if (!empty($errors)) {
    return view('registration/create', [
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);
// verificar se o email ja existe
$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email])->fetch();

if ($user) {
    // Se sim, redirecionar para login
    header('Location: /');
    exit;
    // Se não, criar o usuario e logue-o
}
else{
    $db->query("INSERT INTO users (email, password)  VALUES (:email, :password)", [
        'email' => $email,
        'password' => $password
    ]);

    $_SESSION['user'] = [
        'email' => $email,
    ];

    header('Location: /');
    exit();
}