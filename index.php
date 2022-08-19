<?php

require("vendor/autoload.php");

use Trulyao\PhpRouter\Router as Router;
use Trulyao\PhpRouter\HTTP\Response as Response;
use Trulyao\PhpRouter\HTTP\Request as Request;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();


$router = new Router(__DIR__ . "/src", "");

$router->get("/", function (Request $request, Response $response) {
    return $response->send([
        "message" => "Hello World",
    ]);
});

$router->get("/phpmyadmin", function (Request $request, Response $response) {
    return $response->redirect("http://localhost:2083");
});

$router->serve();
