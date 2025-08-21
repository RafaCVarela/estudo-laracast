<?php

use Core\Database;
use Core\Response;
use Core\App;


$heading = 'Editar a Nota';


$db = App::resolve(Database::class);


$heading = 'Nota';
$currentUserId = 1;


$note = $db->query("SELECT * FROM notes WHERE id=:id", [":id" => $_GET['id']])->fetchOrAbort();

autorize($note['user_id'] === $currentUserId, Response::HTTP_FORBIDDEN);

view("notes/edit", [
    'heading' => $heading,
    'errors' => [],
    'note' => $note
]);