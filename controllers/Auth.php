<?php

namespace app\controllers;

use app\cores\Request;
use app\cores\Response;

class Auth extends BaseController
{
    public function login(Request $req, Response $res): void
    {
        $body = $req->body();

        echo $body;
    }

    public function renderLogin(): void
    {
        $this->view("login/login", ["title" => "Login"]);
    }


}