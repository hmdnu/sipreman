<?php

use app\models\BaseSeeder;
use app\models\database\championLevel\RegencyChamp;

class s_016RegencyChampSeeder implements BaseSeeder
{
    public function create(): bool
    {
        $regencyChampIds = ["REG001"];
        $nim = ["210010003"];

        for ($i = 0; $i < count($regencyChampIds); $i++) {
            $res = RegencyChamp::insert([
                "id" => $regencyChampIds[$i],
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
        return RegencyChamp::deleteAll();
    }
}
