<?php

use app\models\BaseSeeder;
use app\models\database\users\Student;

class s_006StudentSeeder implements BaseSeeder
{
    public function create(): bool
    {
        $nim = ["210010001", "210010002", "210010003", "210010004"];
        $name = ["Sophia Turner", "Liam Peterson", "Olivia Bennett", "Ethan Carter"];
        $studyProgramId = ["SI101", "MI202", "EL303", "CV404", "CH505"];
        $majorId = ["TI101", "TM202", "TE303", "TS404", "TK505"];

        for ($i = 0; $i < count($nim); $i++) {
            $res = Student::insert([
                'nim' => $nim[$i],
                'name' => $name[$i],
                'studyProgramId' => $studyProgramId[$i],
                'majorId' => $majorId[$i]
            ]);

            if (!$res) {
                return false;
            }
        }

        return true;
    }

    public function delete(): bool
    {
        return Student::deleteAll();
    }
}