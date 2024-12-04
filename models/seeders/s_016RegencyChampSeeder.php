<?php

use app\models\BaseSeeder;
use app\models\database\championLevel\RegencyChamp;

class s_016RegencyChampSeeder implements BaseSeeder
{
    public function create(): array
    {
        $regencyChampIds = ["REG001"];
        $nim = ["210010003"];

        $res = [];

        for ($i = 0; $i < count($regencyChampIds); $i++) {
            $res[$i] = RegencyChamp::insert([
                "id" => $regencyChampIds[$i],
                "nim" => $nim[$i]
            ]);
        }

        return $res;
    }

    public function delete(): array
    {
        return RegencyChamp::deleteAll();
    }
}
