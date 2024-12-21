<?php


use app\models\BaseSeeder;
use app\models\database\users\Admin;

class s_002AdminSeeder implements BaseSeeder
{
    public function create(): bool
    {
        $nip = ["100321101", "100321102", "100321103", "100321104"];
        $name = ["Dwayne Johnson", "Erick Smith", "Alan Walker", "Elizabeth Rosenberg"];

        for ($i = 0; $i < count($nip); $i++) {
            $res =  Admin::insert([
                "nip" => $nip[$i],
                "name" => $name[$i]
            ]);

            if (!$res) {
                return false;
            }
        }

        return true;
    }

    public function delete(): bool
    {
        return Admin::deleteAll();
    }
}