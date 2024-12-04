<?php

use app\models\BaseSeeder;
use app\models\database\championLevel\ProvinceChamp;

class s_015ProvinceChampSeeder implements BaseSeeder
{
    public function create(): array
    {
        $provinceChampIds = ["PRV001"];
        $nim = ["210010004"];

        $res = [];

        for ($i = 0; $i < count($provinceChampIds); $i++) {
            $res[$i] = ProvinceChamp::insert([
                "id" => $provinceChampIds[$i],
                "nim" => $nim[$i]
            ]);
        }

        return $res;
    }

    public function delete(): array
    {
        return ProvinceChamp::deleteAll();
    }
}
