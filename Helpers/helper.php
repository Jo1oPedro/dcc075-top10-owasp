<?php

use Security\Skeleton\Http\Middleware\RequestHandler;
use Security\Skeleton\Http\Request;

require_once __DIR__ . "/../vendor/autoload.php";

function middleware(string ...$middlewares): void
{
    $requestHandler = new RequestHandler($middlewares);
    $request = Request::getRequest();
    $requestHandler->handle($request);
}

function view(string $path, array $variables = []): string
{
    extract($variables);
    return require_once __DIR__ . "/../src/resources/views/{$path}.php";
}

function redirect(string $path): void
{
    header("Location: {$path}");
    exit;
}
