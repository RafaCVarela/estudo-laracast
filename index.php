<?php

require "functions.php";
require "Database.php";
// require "router.php";


$db = new Database();
$posts = $db->query("SELECT * FROM post WHERE id > 1")->fetchAll(PDO::FETCH_ASSOC);


foreach ($posts as $post){
    echo "<li>" . $post['title'] . "</li>";
}

dd($posts[0]['title']);
