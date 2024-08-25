<?php

namespace Security\Skeleton\Http\Middleware;

use Security\Skeleton\Http\Request;

class ParseQueryString implements MiddlewareInterface
{

    public function process(Request &$request, RequestHandlerInterface $requestHandler): void
    {
        if(array_key_exists("QUERY_STRING", $request->server)) {
            parse_str($request->server["QUERY_STRING"], $queryStringArray);
            $request->server = array_merge($request->server, ["PARSED_QUERY_STRING" => $queryStringArray]);
        }
        $requestHandler->handle($request);
    }
}