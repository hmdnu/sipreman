<?php

use app\models\BaseSeeder;
use app\models\database\championLevel\InternationalChamp;

class s_013InternationalChampSeeder implements BaseSeeder
{
    public function create(): bool
    {
        $internationalChampIds = ["INT001"];
        $nim = ["210010002"];

        for ($i = 0; $i < count($internationalChampIds); $i++) {
            $res = InternationalChamp::insert([
                "id" => $internationalChampIds[$i],
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
        return InternationalChamp::deleteAll();
    }
}
