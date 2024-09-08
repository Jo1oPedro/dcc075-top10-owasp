<?php

namespace Security\Skeleton\Controllers;

class RegisterController extends Controller
{
    public function __invoke()
    {
        $data = $this->request->post;
        $stmt = $this->connection->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$data["email"]]);
        if(!$stmt->rowCount()) {
            $stmt = $this->connection->prepare("INSERT INTO users (email, password, recover_password) VALUES (?, ?, ?)");
            $stmt->execute([$data["email"], $data["password"], $data["recover_password"]]);
            $stmt = $this->connection->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$data["email"]]);
            $user = $stmt->fetch(\PDO::FETCH_ASSOC);
            $_SESSION["user"] = $user;
            redirect("/");
            exit;
        }
        $_SESSION["errors"] = ["Email já cadastrado"];
        redirect("/register");
    }
}