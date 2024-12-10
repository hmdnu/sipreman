<?php

namespace app\controllers;

use app\cores\Request;
use app\cores\Response;
use app\cores\Session;
use app\models\database\users\User;

class Auth extends BaseController
{
    public function login(Request $req, Response $res): void
    {
        $body = $req->body();
        $noInduk = $body["noInduk"];
        $password = $body["password"];

        // handle login logic
        try {
            $user = User::findOne($noInduk)["result"][0];

        
            if (!$user) {
                $this->view("login/login", "login", ["error" => "user not found"]);
                return;
            }

            if (!password_verify($password, $user["password"])) {
                $this->view("login/login", "login", ["error" => "wrong password"]);
                return;
            }

            Session::set("user", $user["no_induk"]);
            Session::set("role", $user["role"]);

            // redirect each user to their page
            switch ($user["role"]) {
                case "student":
                    $res->redirect("/dashboard/student/{$user["no_induk"]}");
                    break;

                case "admin":
                    $res->redirect("/dashboard/admin/{$user["no_induk"]}");
                    break;
                default:
                    $res->redirect("/");
                    break;
            }


        } catch (\PDOException $e) {
            var_dump($e->getMessage());
        }
    }

    public function renderLogin(): void
    {
        $this->view("login/login", "login");
    }

    public function logout(Request $req, Response $res): void
    {
        Session::destroy();
        $res->redirect("/login");
    }
}