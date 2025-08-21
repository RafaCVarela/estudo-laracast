<?php

use Core\App;
use Core\Database;
use Core\Validator;
use Core\Response;

$heading = 'Editar Nota';

$db = App::resolve(Database::class);

$currentUserId = 1;

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $_POST['id'] ?? null
])->fetchOrAbort();

autorize($note['user_id'] === $currentUserId, Response::HTTP_FORBIDDEN);

$errors = [];

if (!Validator::validateNoteBody(($_POST['body']), 1, 100)) {
    $errors['body'] = 'A nota deve ter entre 1 e 100 caracteres.';
}

if (count($errors)) {
    return view('notes/edit', [
        'heading' => $heading,
        'errors' => $errors,
        'note' => $note
    ]);
}

$db->query('UPDATE notes SET body = :body WHERE id = :id', [
    'body' => $_POST['body'],
    'id' => $note['id']
]);

header('Location: /notes');
die();
