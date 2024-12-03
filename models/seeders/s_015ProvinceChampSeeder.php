<?php

use app\models\BaseSeeder;
use app\models\database\championLevel\ProvinceLevel;

class s_015ProvinceChampSeeder implements BaseSeeder
{
    public function create(): array
    {
        $provinceChampIds = ["PRV001", "PRV002"];
        $nim = ["210010004", "210010007"];

        $res = [];

        for ($i = 0; $i < count($provinceChampIds); $i++) {
            $res[$i] = ProvinceLevel::insert([
                "id" => $provinceChampIds[$i],
                "nim" => $nim[$i]
            ]);
        }

        return $res;
    }

    public function delete(): array
    {
        return ProvinceLevel::deleteAll();
    }
}
