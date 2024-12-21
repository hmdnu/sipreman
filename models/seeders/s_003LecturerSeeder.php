<?php


use app\models\BaseSeeder;
use app\models\database\users\Lecturer;

class s_003LecturerSeeder implements BaseSeeder
{
    public function create(): bool
    {
        $nidn = ["192345601", "192345602", "192345603", "192345604"];
        $name = ["Dr. Sarah Kingston", "Prof. Jonathan Patel", "Dr. Emily Navarro", "Mr. Richard Alston"];


        for ($i = 0; $i < count($nidn); $i++) {
            $res[$i] = Lecturer::insert([
                "nidn" => $nidn[$i],
                "name" => $name[$i],
            ]);
        }
        return true;
    }

    public function delete(): bool
    {
        return Lecturer::deleteAll();
    }
}