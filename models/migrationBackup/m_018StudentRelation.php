<?php

namespace app\models\migrationBackup;

use app\models\BaseMigration;
use app\models\prestasiCore\Prestasi;
use app\models\users\Student;
use app\models\users\User;

class m_018StudentRelation implements BaseMigration
{
    public function up($db)
    {
        $studentTable = Student::TABLE;
        $nim = Student::NIM;
        $userTable = User::TABLE;
        $noInduk = User::NO_INDUK;
        $prestasiId = Student::PRESTASI_ID;
        $prestasiTable = Prestasi::TABLE;


        $tsql = "
        ALTER TABLE [$studentTable] ADD FOREIGN KEY ([$nim]) REFERENCES [user] ([$noInduk])
        ALTER TABLE [$studentTable] ADD FOREIGN KEY ([$prestasiId]) REFERENCES [$prestasiTable] ([id])
        ALTER TABLE [$studentTable] ADD FOREIGN KEY ([study_program_id]) REFERENCES [study_program] ([id])
        ALTER TABLE [$studentTable] ADD FOREIGN KEY ([major_id]) REFERENCES [major] ([id]);";

        return $db->prepare($tsql);
    }

    public function down($db)
    {
    }

}