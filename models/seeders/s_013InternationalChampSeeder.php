<?php

use app\models\BaseSeeder;
use app\models\database\championLevel\InternationalLevel;

class s_013InternationalChampSeeder implements BaseSeeder
{
    public function create(): array
    {
        $internationalChampIds = ["INT001", "INT002", "INT003"];
        $nims = ["210010002", "210010005", "210010006"];

        $res = [];

        for ($i = 0; $i < count($internationalChampIds); $i++) {
            $res[$i] = InternationalLevel::insert([
                "id" => $internationalChampIds[$i],
                "nim" => $nims[$i]
            ]);
        }

        return $res;
    }

    public function delete(): array
    {
        return InternationalLevel::deleteAll();
    }
}
