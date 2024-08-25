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
                header("Location: /bankAccounts");
            } catch (Exception $exception) {
                view("login");
            }
            break;
        case "/bankAccounts":
            try {
                middleware(Authenticate::class, ParseQueryString::class);
                (new BankController)->index();
            } catch (Exception $exception) {
                return;
            }
            break;
        case "/bankAccount":
            try {
                middleware(Authenticate::class, ParseQueryString::class);
                (new BankController)->show($request->server["PARSED_QUERY_STRING"]["id"]);
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