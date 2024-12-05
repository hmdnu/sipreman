<?php

namespace app\controllers;

use app\cores\Request;
use app\cores\Response;
use app\models\database\users\Student;
use app\cores\Session;

class Dashboard extends BaseController
{
    public function studentUploadPrestasi(Request $req, Response $res): void
    {

        $nim = Session::get("user");

        try {
            $user = Student::findOne($nim)["result"][0];

            $this->view("dashboard/student/upload", "Dashboard Mahasiswa", ["nim" => $user["nim"], "name" => $user["name"]]);

        } catch (\PDOException $err) {
            var_dump("error bang", $err->getMessage());
        }
    }

    public function studentValidation(Request $req, Response $res): void
    {
        try {
            $this->view("dashboard/student/validation", "Validation");
        } catch (\PDOException $err) {
            var_dump("error bang", $err->getMessage());
        }
    }

    public function studentPoint(Request $req, Response $res): void
    {
        try {
            $this->view("dashboard/student/point", "Point");
        } catch (\PDOException $err) {
            var_dump("error bang", $err->getMessage());
        }
    }


    public function adminDashboard(Request $req, Response $res): void
    {
        $this->view("dashboard/admin", "Dashboard Admin");
    }
}