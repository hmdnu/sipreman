<?php

use app\models\BaseSeeder;
use app\models\database\Major;

class s_004MajorSeeder implements BaseSeeder
{
    public function create(): array
    {
        $majorIds = ["TI101", "TM202", "TE303", "TS404", "TK505"];
        $majorName = ["Teknologi Informasi", "Teknik Mesin", "Teknik Elektro", "Teknik Sipil", "Teknik Kimia"];
        $totalVictoryMajor = [0, 0, 0, 0, 0];

        $res = [];

        for ($i = 0; $i < count($majorName); $i++) {
            $res[$i] = Major::insert([
                "id" => $majorIds[$i],
                "major_name" => $majorName[$i],
                "total_victory_major" => $totalVictoryMajor[$i],
            ]);
        }

        return $res;
    }

    public function delete(): array
    {
        return Major::deleteAll();
    }
}