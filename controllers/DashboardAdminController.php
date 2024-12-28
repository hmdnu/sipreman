<?php

namespace app\controllers;

use app\cores\Request;
use app\cores\Response;
use app\cores\Session;
use app\models\database\championLevel\InternationalChamp;
use app\models\database\championLevel\NationalChamp;
use app\models\database\championLevel\ProvinceChamp;
use app\models\database\championLevel\RegencyChamp;
use app\models\database\prestasiCore\Prestasi;
use app\models\database\users\Admin;
use app\models\database\users\Student;

class DashboardAdminController extends BaseController
{
    private string $nip;

    public function __construct()
    {
        parent::__construct();
        $this->nip = Session::get("user");
    }

    public function adminDashboard(Request $req, Response $res): void
    {
        try {
            $adminData = $this->getAdminData($this->nip);
            $stats = $this->getStatsData();


            $this->view("dashboard/admin/dashboard", "Dashboard", [
                "adminData" => $adminData,
                "stats" => $stats
            ]);
        } catch (\PDOException $err) {
            var_dump("error bang", $err->getMessage());
        }
    }

    public function adminValidation(Request $req, Response $res): void
    {
        try {
            $adminData = $this->getAdminData($this->nip);
            $validatingPrestasi = Prestasi::getValidatingPrestasi();

            $this->view("dashboard/admin/validation", "Validasi Mahasiswa", [
                "adminData" => $adminData
            ]);
        } catch (\PDOException $err) {
            var_dump("error bang", $err->getMessage());
        }
    }

    public function adminDataStudent(Request $req, Response $res): void
    {
        try {
            $adminData = $this->getAdminData($this->nip);
            $studentData = Student::getValidatedStudentsData();

            $this->view("dashboard/admin/dataStudent", "Data Mahasiswa", [
                "adminData" => $adminData,
                "studentData" => $studentData
            ]);
        } catch (\PDOException $err) {
            var_dump("error bang", $err->getMessage());
        }
    }

    public function studentsData()
    {
        $adminData = $this->getAdminData($this->nip);


        $this->view("dashboard/admin/validatingStudentData", "Validating Data", [
            "adminData" => $adminData
        ]);
    }

    private function getStatsData(): array
    {
        return [
            "international" => InternationalChamp::getTotalVictors(),
            "national" => NationalChamp::getTotalVictors(),
            "province" => ProvinceChamp::getTotalVictors(),
            "regency" => RegencyChamp::getTotalVictors()
        ];
    }

    private function getAdminData(string $nip): array
    {
        $user = Admin::findOne($nip);

        return [
            "nip" => $user["nip"],
            "name" => $user["name"]
        ];
    }
}
