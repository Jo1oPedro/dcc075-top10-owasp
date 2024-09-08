<?php

namespace Security\Skeleton\Redis;

class Connection
{
    public static \Redis|null $instance = null;
    public function __construct() {}

    public static function getConnection()
    {
        if(is_null(self::$instance)) {
            self::$instance = new \Redis();
            self::$instance->connect("redis", 6379);
        }
        return self::$instance;
    }
}