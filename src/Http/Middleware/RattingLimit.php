<?php

namespace Security\Skeleton\Http\Middleware;

use Security\Skeleton\Http\Request;
use Security\Skeleton\Redis\Connection;

class RattingLimit implements MiddlewareInterface
{
    public function __construct(
        public \Redis|null $redis = null
    ) {
        $this->redis = Connection::getConnection();
    }

    public function process(Request &$request, RequestHandlerInterface $requestHandler): void
    {
        $userIp = $request->server["REMOTE_ADDR"];
        if($this->redis->exists($userIp)) {
            if($this->redis->get($userIp) >= 3) {
                $_SESSION["errors"] = ["Wait 60 seconds to try again."];
                redirect("/login");
            };
        }
        $requestHandler->handle($request);
    }
}