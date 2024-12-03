<?php

use app\models\BaseSeeder;
use app\models\database\championLevel\NationalLevel;

class s_014NationalChampSeeder implements BaseSeeder
{
    public function create(): array
    {
        $nationalChamIds = ["NAT001", "NAT002"];
        $nim = ["210010001", "210010003"];

        $res = [];

        for ($i = 0; $i < count($nationalChamIds); $i++) {
            $res[$i] = NationalLevel::insert([
                "id" => $nationalChamIds[$i],
                "nim" => $nim[$i]
            ]);
        }

        return $res;
    }

    public function delete(): array
    {
        return NationalLevel::deleteAll();
    }
}
