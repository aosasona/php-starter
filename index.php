<?php

require("vendor/autoload.php");

use Trulyao\PhpRouter\Router as Router;
use Trulyao\PhpRouter\Helper\Response as Response;
use Trulyao\PhpRouter\Helper\Request as Request;
use Trulyao\PhpStarter\Controllers\AuthController as AuthController;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

// Controllers
$AuthController = new AuthController();

// Router
$router = new Router(__DIR__ . "/src", "v1");

$router->get("/", function (Request $request, Response $response) {
    return $response->send([
        "message" => "Welcome to the API"
    ]);
});

$router->post("/auth/login", [$AuthController, "sign_in"]);

$router->post("/auth/signup", [$AuthController, "sign_up"]);

$router->get("/phpmyadmin", function (Request $request, Response $response) {
    return $response->redirect("http://localhost:2083");
});

$router->serve();
