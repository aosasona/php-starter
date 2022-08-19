<?php

namespace Trulyao\PhpStarter\Controllers;

use Trulyao\PhpRouter\HTTP\Response as Response;
use Trulyao\PhpRouter\HTTP\Request as Request;
use Trulyao\PhpStarter\Services\Connection as Connection;

class AuthController
{

    private $pdo;
    private $conn;

    public function __construct()
    {
        $this->pdo = new Connection();
        $this->conn = $this->pdo->getPDO();
    }

    public function createUser(Request $request, Response $response)
    {

    }

    public function loginUser(Request $request, Response $response)
    {

    }

}