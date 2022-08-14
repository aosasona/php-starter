<?php

namespace Trulyao\PhpJwt\Controllers;

use Trulyao\PhpRouter\Helper\Response as Response;
use Trulyao\PhpRouter\Helper\Request as Request;

class AuthController {
    public static function sign_up (Request $request, Response $response): Response
    {
        extract($request->body());

        if ($password !== $confirm_password) {
            return $response->status(400)->json([
                "success" => false,
                "message" => "Passwords do not match"
            ]);
        }

        return $response->json($request->body());
    }

    public static function sign_in (Request $request, Response $response): Response
    {
        $body = $request->body();

        return $response->json($request->body());
    }
}