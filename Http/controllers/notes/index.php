<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);


$heading = 'Notas';



$notes = $db->query("SELECT * FROM notes WHERE user_id = 1")->fetchAll();


view("/notes/index", [
    'heading' => $heading,
    'notes' => $notes
]);