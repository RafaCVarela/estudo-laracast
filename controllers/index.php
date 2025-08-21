<?php

$_SESSION['name'] = 'Rafael';

$heading = 'Home';

view("index", [
    'heading' => $heading
]);
