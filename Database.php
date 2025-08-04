<?php

// Conectar ao meu banco de dados MySQl e executa uma query
class Database {

    public $connection;
    public function __construct()
    {
        $dsn = "mysql:host=localhost;port=3306;dbname=myapp;user=root;password=1243;charset=utf8mb4";
        $this->connection = new PDO($dsn);
    }

    public function query ($query){


        $statement = $this->connection->prepare($query);
        $statement->execute();

        return $statement;
    }
}

