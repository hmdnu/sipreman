<?php


use app\models\BaseSeeder;
use app\models\database\users\Lecturer;

class s_003LecturerSeeder implements BaseSeeder
{
    public function create(): array
    {
        $nidn = ["192345601", "192345602", "192345603", "192345604"];
        $name = ["Dr. Sarah Kingston", "Prof. Jonathan Patel", "Dr. Emily Navarro", "Mr. Richard Alston"];

        $res = [];

        for ($i = 0; $i < count($nidn); $i++) {
            $res[$i] = Lecturer::insert([
                "nidn" => $nidn[$i],
                "name" => $name[$i],
            ]);
        }
        return $res;
    }

    public function delete(): array
    {
        return Lecturer::deleteAll();
    }


}