<?php

use Security\Skeleton\Controllers\BankController;
use Security\Skeleton\Controllers\ForgetPasswordController;
use Security\Skeleton\Controllers\LoginController;
use Security\Skeleton\Controllers\RegisterController;
use Security\Skeleton\Http\Middleware\Authenticate;
use Security\Skeleton\Http\Middleware\ParseQueryString;

if($request->server['REQUEST_METHOD'] == 'GET') {
    switch ($request->server['PATH_INFO'] ?? "/") {
        case "/":
            try {
                middleware(Authenticate::class);
                redirect("/bankAccounts");
            } catch (Exception $exception) {
                view("login");
            }
            break;
        case "/register": {
            try {
                middleware(Authenticate::class);
                redirect("/");
            } catch (Exception $exception) {
                view("/register");
            }
            break;
        }
        case "/login": {
            try {
                middleware(Authenticate::class);
                redirect("/");
            } catch (Exception) {
                view("login");
            }
            break;
        }
        case "/bankAccounts":
            try {
                middleware(Authenticate::class, ParseQueryString::class);
                (new BankController)->index();
            } catch (Exception $exception) {
                redirect("/login");
                return;
            }
            break;
        case "/bankAccount":
            try {
                middleware(Authenticate::class, ParseQueryString::class);
                (new BankController)->show($request->server["PARSED_QUERY_STRING"]["id"]);
            } catch (Exception $exception) {
                redirect("/login");
                return;
            }
            break;
        case "/forgot-password":
            try {
                middleware(Authenticate::class);
                redirect("/");
            } catch (Exception $exception) {
                (new ForgetPasswordController())->
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
                redirect("/");
            } catch (Exception $exception) {
                (new LoginController())->login();
            }
        case "/register":
            try {
                middleware(Authenticate::class);
                redirect("/");
            } catch (Exception $exception) {
                (new RegisterController())();
            }
        case "/logout":
            try {
                middleware(Authenticate::class);
                (new LoginController())->logout();
            } catch (Exception $exception) {
                redirect("/");
            }
    }
}