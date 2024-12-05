<?php

namespace app\middlewares;

use app\cores\Request;
use app\cores\Response;
use app\cores\Session;
use app\models\database\users\Student;

class StudentMiddleware implements Middleware
{
    public function before(Request $req, Response $res): void
    {
        if (Session::get("role") !== "student") {
            $res->redirect("/login");
            return;
        }

        $student = Student::findOne(Session::get("user"));
        $nim = $student["result"][0]["nim"];

        if ($req->getParams("nim") !== $nim) {
            $res->redirect("/404.html");
        }
    }
}