<?php

use Core\Database;

$config = require basePath("config");
$db = new Database($config['database']);


$heading = 'Notas';



$notes = $db->query("SELECT * FROM notes WHERE user_id = 1")->fetchAll();


view("/notes/index", [
    'heading' => $heading,
    'notes' => $notes
]);