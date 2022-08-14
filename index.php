<?php

require("vendor/autoload.php");

use Trulyao\PhpRouter\Router as Router;
use Trulyao\PhpJwt\Controllers\AuthController as AuthController;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$router = new Router(__DIR__ . "/src", "v1");

$router->post("/auth/login", function ($req, $res) {
    return AuthController::sign_in($req, $res);
});

$router->post("/auth/signup", function ($req, $res) {
    return AuthController::sign_up($req, $res);
});

$router->get("/phpmyadmin", function($request, $response) {
    return $response->redirect("http://localhost:2083");
});

$router->serve();