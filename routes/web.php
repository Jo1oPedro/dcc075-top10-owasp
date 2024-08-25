<?php

use Security\Skeleton\Controllers\BankController;
use Security\Skeleton\Controllers\LoginController;
use Security\Skeleton\Http\Middleware\Authenticate;
use Security\Skeleton\Http\Middleware\ParseQueryString;

if($request->server['REQUEST_METHOD'] == 'GET') {
    switch ($request->server['PATH_INFO'] ?? "/") {
        case "/":
            try {
                middleware(Authenticate::class);
            } catch (Exception $exception) {
                require_once __DIR__ . "/../src/resources/views/login.php";
            }
            break;
        case "/bankAccount":
            try {
                middleware(ParseQueryString::class);
                (new BankController)($request->server["PARSED_QUERY_STRING"]["id"]);
            } catch (Exception $exception) {
                return;
            }
            break;
    };
}

if($request->server["REQUEST_METHOD"] == "POST") {
    switch ($request->server["PATH_INFO"]) {
        case "/login":
            try {
                middleware(Authenticate::class);
                header("Location: /");
            } catch (Exception $exception) {
                (new LoginController())();
            }
    }
}