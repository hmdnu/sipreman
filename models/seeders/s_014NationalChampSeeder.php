<?php

use app\models\BaseSeeder;
use app\models\database\championLevel\NationalChamp;

class s_014NationalChampSeeder implements BaseSeeder
{
    public function create(): bool
    {
        $nationalChamIds = ["NAT001"];
        $nim = ["210010001"];

        for ($i = 0; $i < count($nationalChamIds); $i++) {
            $res = NationalChamp::insert([
                "id" => $nationalChamIds[$i],
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
        return NationalChamp::deleteAll();
    }
}
