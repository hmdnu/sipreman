<?php

use app\models\BaseSeeder;
use app\models\database\StudyProgram;

class s_005StudyProgramSeeder implements BaseSeeder
{
    public function create(): array
    {
        $programIds = ["SI101", "MI202", "EL303", "CV404", "CH505"];
        $programNames = [
            "Sistem Informasi",
            "Manajemen Informatika",
            "Teknologi Listrik",
            "Rekayasa Konstruksi",
            "Rekayasa Material"
        ];
        $majorIds = ["TI101", "TM202", "TE303", "TS404", "TK505"];
        $totalVictoryStudyProgram = [0, 0, 0, 0, 0];
        $res = [];

        for ($i = 0; $i < count($programIds); $i++) {
            $res[$i] = StudyProgram::insert([
                "id" => $programIds[$i],
                "program_name" => $programNames[$i],
                "major_id" => $majorIds[$i],
                "total_victory_study_program" => $totalVictoryStudyProgram[$i],
            ]);
        }

        return $res;
    }

    public function delete(): array
    {
        return StudyProgram::deleteAll();
    }
}
