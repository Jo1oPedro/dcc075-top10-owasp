<?php

namespace Security\Skeleton\Controllers;

use PDO;

class ForgetPasswordController extends Controller
{
    public function forgotPassword()
    {
        $stmt = $this->connection->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(["email" => $this->request->post["email"]]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$user) {
            $_SESSION["errors"] = ["Incorrect email"];
            redirect("/forgot-password");
            exit;
        }

        if($user["recover_password"] === $this->request->post["recover_password"]) {
            $_SESSION["recover_password_email"] = $user["email"];
            redirect("/new-password");
            exit;
        }

        $_SESSION["errors"] = ["Incorrect recover password answer"];
        redirect("/forgot-password");
        exit;
    }

    public function newPassword()
    {
        $stmt = $this->connection->prepare("UPDATE users SET password = :password WHERE email = :email");
        $hashed_password = password_hash($this->request->post["password"], PASSWORD_DEFAULT);
        $stmt->execute(["password" => $hashed_password, "email" => $_SESSION["recover_password_email"]]);
        redirect("/");
        exit;
    }
}