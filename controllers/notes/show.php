<?php


$config = require basePath("config.php");
$db = new Database($config['database']);


$heading = 'Nota';
$currentUserId = 1;


$note = $db->query("SELECT * FROM notes WHERE id=:id", [":id" => $_GET['id']])->fetchOrAbort();

autorize($note['user_id'] === $currentUserId, Response::HTTP_FORBIDDEN);


require view("notes/show", [
    'heading' => $heading,
    'note' => $note
]);