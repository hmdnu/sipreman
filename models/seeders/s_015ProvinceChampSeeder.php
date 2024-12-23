<?php

use app\models\BaseSeeder;
use app\models\database\championLevel\ProvinceChamp;

class s_015ProvinceChampSeeder implements BaseSeeder
{
    public function create(): bool
    {
        $provinceChampIds = ["PRV001"];
        $nim = ["210010004"];

        for ($i = 0; $i < count($provinceChampIds); $i++) {
            $res = ProvinceChamp::insert([
                "id" => $provinceChampIds[$i],
                "nim" => $nim[$i]
            ]);

            if (!$res) {
                return false;
            }
        }

        return true;
    }

    public function delete(): bool
    {
        return ProvinceChamp::deleteAll();
    }
}
