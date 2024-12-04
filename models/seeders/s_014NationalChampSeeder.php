<?php

use app\models\BaseSeeder;
use app\models\database\championLevel\NationalChamp;

class s_014NationalChampSeeder implements BaseSeeder
{
    public function create(): array
    {
        $nationalChamIds = ["NAT001"];
        $nim = ["210010001"];

        $res = [];

        for ($i = 0; $i < count($nationalChamIds); $i++) {
            $res[$i] = NationalChamp::insert([
                "id" => $nationalChamIds[$i],
                "nim" => $nim[$i]
            ]);
        }

        return $res;
    }

    public function delete(): array
    {
        return NationalChamp::deleteAll();
    }
}
