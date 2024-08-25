<?php

namespace Security\Skeleton\Controllers;

use PDO;

class LoginController extends Controller
{
    public function __invoke()
    {
        $email = $this->request->post["email"];
        $password = $this->request->post["password"];

        $stmt = $this->connection->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(["email" => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($password, $user["password"])) {
            $_SESSION["user"] = $user;
            header("Location: /bankAccount?id={$user["id"]}");
            exit;
        } else {
            header("Location: /login");
        }
    }
}