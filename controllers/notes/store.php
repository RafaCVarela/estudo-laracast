<?php

use Core\Validator;
use Core\Database;
use Core\App;

$db = App::resolve(Database::class);


$heading = 'Criar Nota';
$errors = [];

if (!Validator::validateString(($_POST['body']), 1, 100)) {
    $errors['body'] = 'A nota deve ter entre 1 e 100 caracteres.';
}

if (!empty($errors)) {
   return view("notes/create", [
    'heading' => $heading,
    'errors' => $errors ?? []
    ]);
}

$db->query('INSERT INTO notes (body, user_id) VALUE (:body, :user_id)', [
'body' => $_POST['body'],
'user_id' => 1
]); 

header('Location: /notes');
die();
