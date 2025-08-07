<?php


require "Validator.php";

$config = require "config.php";
$db = new Database($config['database']);

$heading = 'Criar Nota';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [];

    if (!Validator::validateNoteBody(($_POST['body']), 1, 100)) {
        $errors['body'] = 'A nota deve ter entre 1 e 100 caracteres.';
    }

    if (empty($errors)) {
        $db->query('INSERT INTO notes (body, user_id) VALUE (:body, :user_id)', [
        'body' => $_POST['body'],
        'user_id' => 1
    ]);    
    }
    
}

require "views/notes/create.view.php";