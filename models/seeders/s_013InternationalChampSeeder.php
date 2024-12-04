<?php

use app\models\BaseSeeder;
use app\models\database\championLevel\InternationalChamp;

class s_013InternationalChampSeeder implements BaseSeeder
{
    public function create(): array
    {
        $internationalChampIds = ["INT001"];
        $nim = ["210010002"];

        $res = [];

        for ($i = 0; $i < count($internationalChampIds); $i++) {
            $res[$i] = InternationalChamp::insert([
                "id" => $internationalChampIds[$i],
                "nim" => $nim[$i]
            ]);
        }

        return $res;
    }

    public function delete(): array
    {
        return InternationalChamp::deleteAll();
    }
}
