<?php

namespace app\models\migrationBackup;

use app\models\BaseMigration;
use app\models\users\Lecturer;
use app\models\users\User;

class m_004LecturerMigration implements BaseMigration
{
    public function up($db)
    {
        $table = Lecturer::TABLE;
        $id = Lecturer::ID;
        $nidn = Lecturer::NIDN;
        $nama = Lecturer::NAMA;
        $noInduk = User::NO_INDUK;

        $tsql = "
            IF NOT EXISTS (
                SELECT * 
                FROM sysobjects 
                WHERE name = '$table' AND xtype = 'U'
            )
            BEGIN
                CREATE TABLE $table (
                    [$id] nvarchar PRIMARY KEY,
                    [$nidn] nvarchar UNIQUE,
                    [$nama] nvarchar,
                )
            END;";

        return $db->prepare($tsql);
    }

    public function down($db)
    {
        $table = Lecturer::TABLE;
        $tsql = "DROP TABLE IF EXIST $table;";

        return $db->prepare($tsql);
    }

}