<?php

namespace app\controllers;

class Auth extends BaseController
{
    public function login(): void
    {

    }

    public function renderLogin(): void
    {
        $this->view("login/login", ["title" => "Login"]);
    }


}