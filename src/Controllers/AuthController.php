<?php

namespace Trulyao\PhpJwt\Controllers;

use Exception;
use Trulyao\PhpRouter\Helper\Response as Response;
use Trulyao\PhpRouter\Helper\Request as Request;

class AuthController {

    public static function sign_up (Request $request, Response $response): Response
    {
        try {
            extract($request->body());

            if (empty($full_name) || empty($email) || empty($password) || empty($confirm_password)) {
                return $response->status(400)->json([
                    "success" => false,
                    "message" => "Please fill all fields"
                ]);
            }

            $name = explode(" ", $full_name);

            [$first_name, $last_name] = $name + [null, null];

            if (empty($first_name) || empty($last_name)) {
                return $response->json([
                    "success" => false,
                    "message" => "First name and last name are required"
                ])->status(400);
            }

            if ($password !== $confirm_password) {
                return $response->json([
                    "success" => false,
                    "message" => "Passwords do not match"
                ])->status(400);
            }

            return $response->json($request->body());
        } catch (Exception $e) {
            return $response->status(500)->json([
                "success" => false,
                "message" => "Server error!"
            ]);
        }
    }

    public static function sign_in (Request $request, Response $response): Response
    {
        $body = $request->body();

        return $response->json($request->body());
    }

}