<?php

require "functions.php";
// require "router.php";

// Conectar ao meu banco de dados MySQl

$dsn = "mysql:host=localhost;port=3306;dbname=myapp;user=root;password=1243;charset=utf8mb4";

$pdo = new PDO($dsn, 'root');

$stament = $pdo->prepare("SELECT * FROM post ");
$stament->execute();

$posts = $stament->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post){
    echo "<li>" . $post['title'] . "</li>";
}