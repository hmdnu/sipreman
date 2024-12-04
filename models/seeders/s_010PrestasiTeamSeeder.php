<?php

use app\models\BaseSeeder;
use app\models\database\prestasiCore\PrestasiTeam;

class s_010PrestasiTeamSeeder implements BaseSeeder
{
    public function create(): array
    {
        $prestasiTeamIds = ["TM001", "TM002", "TM003", "TM004"];
        $isLeader = [1, 0, 0, 1];
        $isMember = [0, 1, 1, 0];
        $supervisorIds = ["192345601", "192345602", "192345603", "192345604"];
        $nim = ["210010001", "210010002", "210010003", "210010004"];
        $prestasiIds = ["PRE001", "PRE002", "PRE003", "PRE004"];

        $res = [];

        for ($i = 0; $i < count($prestasiTeamIds); $i++) {
            $res[$i] = PrestasiTeam::insert([
                'id' => $prestasiTeamIds[$i],
                'is_leader' => $isLeader[$i],
                'is_member' => $isMember[$i],
                'supervisor_id' => $supervisorIds[$i],
                'nim' => $nim[$i],
                'prestasi_id' => $prestasiIds[$i]
            ]);
        }

        return $res;
    }

    public function delete(): array
    {
        return PrestasiTeam::deleteAll();
    }
}
