<?php

namespace Security\Skeleton\Controllers;

use PDO;

class LoginController extends Controller
{
    public function login()
    {
        $userIp = $this->request->server["REMOTE_ADDR"];
        if(!$this->redis->exists($userIp)) {
            $this->redis->set($userIp, 1);
            $this->redis->expire($userIp, 60);
        }
        $email = $this->request->post["email"];
        $password = $this->request->post["password"];

        $stmt = $this->connection->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(["email" => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($password, $user["password"])) {
            $_SESSION["user"] = $user;
            $this->redis->del($userIp);
            redirect("/bankAccounts");
            exit;
        } else {
            $this->redis->incr($userIp);
            redirect("/login");
        }
    }

    public function logout() {
        unset($_SESSION["user"]);
        redirect("/");
        exit;
    }
}