<?php

$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

$app->get('/login', function () use ($app) {
    
    return $app['twig']->render("login.twig");
})->bind("login");

// Links page
$app->get('/', function () use ($app) {
    require_once '/controllers/linksController.php';
    
    session_start();
    if($_SESSION['login'] == true) {
        $controller = LinksController::getInstance();
        $controller->manage();
        
        return $app['twig']->render("links.twig", $controller->getArrayVar());
    }
    else {
        return $app->redirect($app["url_generator"]->generate("login"));
    }
})->bind("home");

$app->post('/login', function () use ($app) {
    require_once '/controllers/loginController.php';
    
    $controller = LoginController::getInstance();
    $controller->authentification();
    
    session_start();
    if($_SESSION['login'] == true) {
        return $app->redirect($app["url_generator"]->generate("home"));
    }
    else {
        return $app['twig']->render("login.twig",  $controller->getArrayVar());
    }
});

$app->get('/read', function () use ($app) {
    require_once '/controllers/contentController.php';
    
    session_start();
    if($_SESSION['login'] == true) {
        $controller = ContentController::getInstance();
        return $app['twig']->render("content.twig", $controller->getArrayVar());
    }
    else {
        return $app->redirect($app["url_generator"]->generate("login"));
    }
});

$app->get('/signout', function () use ($app) {
    session_start();
    unset($_SESSION['login']);
    return $app->redirect($app["url_generator"]->generate("login"));
});