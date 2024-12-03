<?php

use app\models\BaseSeeder;
use app\models\database\championLevel\RegencyLevel;

class s_016RegencyChampSeeder implements BaseSeeder
{
    public function create(): array
    {
        $regencyChampIds = ["REG001", "REG002"];
        $nim = ["210010008", "210010009"];

        $res = [];

        for ($i = 0; $i < count($regencyChampIds); $i++) {
            $res[$i] = RegencyLevel::insert([
                "id" => $regencyChampIds[$i],
                "nim" => $nim[$i]
            ]);
        }

        return $res;
    }

    public function delete(): array
    {
        return RegencyLevel::deleteAll();
    }
}
