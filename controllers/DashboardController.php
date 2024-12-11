<?php

namespace app\controllers;

use app\cores\Request;
use app\cores\Response;
use app\models\database\users\Student;
use app\cores\Session;
use app\models\database\Major;
use app\models\database\prestasiCore\Prestasi;
use app\models\database\StudyProgram;
use app\models\database\users\Lecturer;

class DashboardController extends BaseController
{
    private string $nim = "";

    public function __construct()
    {
        parent::__construct();
        $this->nim = Session::get("user");
    }

    public function studentUploadPrestasi(Request $req, Response $res): void
    {

        try {
            $studentData = $this->getStudentData($this->nim);

            $this->view("dashboard/student/upload", "Dashboard Mahasiswa", $studentData);
        } catch (\PDOException $err) {
            var_dump("error bang", $err->getMessage());
        }
    }

    public function studentValidation(Request $req, Response $res): void
    {
        try {
            $studentData = $this->getStudentData($this->nim);
            $prestasiData = $this->getPrestasiData($this->nim);

            $this->view("dashboard/student/validation", "Validation", [
                "studentData" => $studentData,
                "prestasiData" => $prestasiData

            ]);
        } catch (\PDOException $err) {
            var_dump("error bang", $err->getMessage());
        }
    }

    public function studentPoint(Request $req, Response $res): void
    {
        try {
            $studentData = $this->getStudentData($this->nim);

            exit;
            $this->view("dashboard/student/point", "Point", $studentData);
        } catch (\PDOException $err) {
            var_dump("error bang", $err->getMessage());
        }
    }

    public function renderAdminDashboardValidation(Request $req, Response $res): void
    {
        $this->view("dashboard/admin/validasi", "Admin validasi");
    }

    public function renderUploadTest(Request $req, Response $res): void
    {

        $this->view("/upload", "upload");
    }

    private function getStudentData(string $nim): array
    {
        $user = Student::findOne($nim);
        $studyPrograms = StudyProgram::findAll();
        $supervisors = Lecturer::findAll();
        $majors = Major::findAll();

        return [
            "nim" => $user["nim"],
            "name" => $user["name"],
            "studyPrograms" => $studyPrograms,
            "supervisors" => $supervisors,
            "majors" => $majors
        ];
    }

    private function getPrestasiData(string $nim): array
    {
        $res = Prestasi::getPrestasiData($nim);
        return $res;
    }
}