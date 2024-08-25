<?php

use Security\Skeleton\Http\Request;

require_once __DIR__ . "/../vendor/autoload.php";

session_start();

$request = Request::getRequest();

require_once __DIR__ . "/../routes/web.php";
