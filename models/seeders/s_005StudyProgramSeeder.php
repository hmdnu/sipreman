<?php

use app\models\BaseSeeder;
use app\models\database\StudyProgram;

class s_005StudyProgramSeeder implements BaseSeeder
{
    public function create(): bool
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

        for ($i = 0; $i < count($programIds); $i++) {
            $res = StudyProgram::insert([
                "id" => $programIds[$i],
                "study_program_name" => $programNames[$i],
                "major_id" => $majorIds[$i],
                "total_victory_study_program" => $totalVictoryStudyProgram[$i],
            ]);

            if (!$res) {
                return false;
            }
        }

        return true;
    }

    public function delete(): bool
    {
        return StudyProgram::deleteAll();
    }
}