<?php

// Home page
$app->get('/', function () {
    require_once '/model/person.php';

    ob_start();             // start buffering HTML output
    require_once '/views/home.php';
    $home = ob_get_clean(); // assign HTML output to $view
    return $home;
});