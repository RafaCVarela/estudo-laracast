<?php

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . "Core/functions.php";


spl_autoload_register (function ($class) {

    $class = str_replace('\\', '/', $class);

    require basePath("{$class}");
});



require basePath("Core/router");



/* 
$id = $_GET['id'];

$query = "SELECT * FROM notes WHERE id=:id";


$notes = $db->query($query, [':id' => $id])->fetch();


dd($notes);

*/
