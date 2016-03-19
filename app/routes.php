<?php

// Home page
$app->get('/', function () {
    //require '.../model.php';

    ob_start();             // start buffering HTML output
    require '../views/home.php';
    $home = ob_get_clean(); // assign HTML output to $view
    return $home;
});