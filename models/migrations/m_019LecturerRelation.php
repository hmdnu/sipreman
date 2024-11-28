<?php

use app\models\BaseMigration;
use app\models\users\Lecturer;
use app\models\users\User;

class m_019LecturerRelation extends BaseMigration
{
    public function up($db)
    {
        $lecturerTable = Lecturer::TABLE;
        $nidn = Lecturer::NIDN;
        $userTable = User::TABLE;
        $noInduk = User::NO_INDUK;

        $tsql = "ALTER TABLE [lecturer] ADD FOREIGN KEY ([nidn]) REFERENCES [user] ([no_induk])";

        return sqlsrv_query($db, $tsql);
    }

    public function down($db)
    {
    }

}