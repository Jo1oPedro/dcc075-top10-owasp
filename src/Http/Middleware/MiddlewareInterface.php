<?php

namespace Security\Skeleton\Http\Middleware;

use Security\Skeleton\Http\Request;

interface MiddlewareInterface
{
    public function process(Request &$request, RequestHandlerInterface $requestHandler): void;
}