<?php

namespace app\controllers;

use app\cores\Session;
use app\cores\Request;
use app\cores\Response;
use app\models\database\users\Student;
use app\models\database\Major;
use app\models\database\prestasiCore\Prestasi;
use app\models\database\StudyProgram;
use app\models\database\users\Lecturer;

class DashboardStudentController extends BaseController
{

    private string $nim;

    public function __construct()
    {
        parent::__construct();
        $this->nim = Session::get("user");
    }

    public function studentUploadPrestasi(Request $req, Response $res): void
    {
        try {
            $studentData = $this->getStudentData($this->nim);

            $this->view("dashboard/student/upload", "Dashboard Mahasiswa", [
                "studentData" => $studentData
            ]);
        } catch (\PDOException $err) {
            var_dump("error bang", $err->getMessage());
        }
    }

    public function studentValidation(Request $req, Response $res): void
    {
        try {
            $studentData = $this->getStudentData($this->nim);
            $prestasiData = Prestasi::getPrestasiData($this->nim);


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
            $validatedPrestasi = Prestasi::getValidatedPrestasiData($this->nim);

            $totalPoint = 0;

            foreach ($validatedPrestasi as $prestasi) {
                $totalPoint += $prestasi["point"];
            }

            $this->view("dashboard/student/point", "Point", [
                "studentData" => $studentData,
                "validatedPrestasi" => $validatedPrestasi,
                "totalPoint" => $totalPoint
            ]);
        } catch (\PDOException $err) {
            var_dump("error bang", $err->getMessage());
        }
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
}