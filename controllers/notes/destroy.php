<?php

use Core\Response;
use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$currentUserId = 1;


$note = $db->query("SELECT * FROM notes WHERE id=:id", [":id" => $_GET['id']])->fetchOrAbort();

autorize($note['user_id'] === $currentUserId, Response::HTTP_FORBIDDEN);

$db->query('DELETE FROM notes WHERE id = :id', [
    'id' => $_GET['id']
]);

header('Location: /notes');

exit();

