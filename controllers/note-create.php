<?php

$heading = 'Criar Nota';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formData = $_POST;
}

require "views/note-create.view.php";