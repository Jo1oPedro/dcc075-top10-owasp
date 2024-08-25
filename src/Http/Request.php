<?php

namespace Security\Skeleton\Http;

class Request
{
    private static Request|null $request = null;

    private function __construct(
        private array $get,
        private array $post,
        private array $cookies,
        private array $files,
        private array $server,
        private array $session
    ) {}

    public function __get(string $name)
    {
        if(isset($this->$name)) {
            return $this->$name;
        }
        return null;
    }

    public function __set(string $name, $value) {
        $this->$name = $value;
    }

    public static function getRequest()
    {
        if(is_null(self::$request)) {
            $jsonPost = file_get_contents("php://input");
            $jsonPost = json_decode($jsonPost, true);
            $post = array_merge($_POST, $jsonPost ?? []);

            self::$request = new self(
                $_GET,
                $post,
                $_COOKIE,
                $_FILES,
                $_SERVER,
                $_SESSION
            );
        }
        return self::$request;
    }
}