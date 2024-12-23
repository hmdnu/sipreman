<?php

use app\models\BaseSeeder;
use app\models\database\prestasiCore\PrestasiTeam;

class s_010PrestasiTeamSeeder implements BaseSeeder
{
    public function create(): bool
    {
        $prestasiTeamIds = ["TM001", "TM002", "TM003", "TM004"];
        $role = ["leader", "member", "leader", "member"];
        $supervisorIds = ["192345601", "192345602", "192345603", "192345604"];
        $nim = ["210010001", "210010002", "210010003", "210010004"];
        $prestasiIds = ["PRE001", "PRE002", "PRE003", "PRE004"];
        $name = ["Sophia Turner", "Liam Peterson", "Olivia Bennett", "Ethan Carter"];

        for ($i = 0; $i < count($prestasiTeamIds); $i++) {
            $res = PrestasiTeam::insert([
                'id' => $prestasiTeamIds[$i],
                'nim' => $nim[$i],
                'name' =>  $name[$i],
                'role' => $role[$i],
                'supervisor_id' => $supervisorIds[$i],
                'prestasi_id' => $prestasiIds[$i]
            ]);

            if (!$res) {
                return false;
            }
        }

        return $res;
    }

    public function delete(): bool
    {
        return PrestasiTeam::deleteAll();
    }
}