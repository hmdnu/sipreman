<?php

namespace app\middlewares;

use app\cores\Request;
use app\cores\Response;
use app\cores\Session;
use app\models\database\users\Admin;

class AdminMiddleware implements Middleware
{
    public function before(Request $req, Response $res): void
    {
        if (Session::get("role") !== "admin") {
            $res->redirect("/login");
            return;
        }

        $student = Admin::findOne(Session::get("user"));
        $nim = $student["result"][0]["nip"];

        if ($req->getParams("nim") !== $nim) {
           $res->redirect("/404.html");
        }
    }
}