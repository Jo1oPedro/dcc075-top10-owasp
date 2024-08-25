<?php

namespace Security\Skeleton\Http\Middleware;

use Security\Skeleton\Http\Request;

interface RequestHandlerInterface
{
    public function handle(Request &$request): void;
}