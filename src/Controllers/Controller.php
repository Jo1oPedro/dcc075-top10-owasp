<?php

namespace Security\Skeleton\Controllers;

use Security\Skeleton\Database\Connection;
use Security\Skeleton\Http\Request;

abstract class Controller
{
    protected \PDO $connection;
    protected Request $request;

    public function __construct()
    {
        $this->connection = Connection::getConnection();
        $this->request = Request::getRequest();
    }
}