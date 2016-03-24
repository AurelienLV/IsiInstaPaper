<?php

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

// Links page
$app->get('/', function () use ($app) {
    require_once '/controllers/linksController.php';
    
    $controller = LinksController::getInstance();
    return $app['twig']->render("links.twig", $controller->getArrayVar());
});

$app->get('/login', function () use ($app) {
    return $app['twig']->render("login.twig");
});

$app->get('/read', function () use ($app) {
    return $app['twig']->render("content.twig");
});