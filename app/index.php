<?php

require_once "vendor/autoload.php";

const BASE_PATH = __DIR__;

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);

$router = new League\Route\Router;
$router->map('GET', '/', [App\Controller\HomeController::class, 'index']);
$router->map('GET', '/login', [App\Controller\LoginController::class, 'index']);
$router->map('GET', '/logout', [App\Controller\LogoutController::class, 'index']);
$router->map('GET', '/install', [App\Controller\InstallController::class, 'index']);

$response = $router->dispatch($request);

// send the response to the browser
(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);