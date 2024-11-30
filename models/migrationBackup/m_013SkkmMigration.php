<?php

namespace app\models\migrationBackup;

use app\models\BaseMigration;
use app\models\prestasiCore\Skkm;

class m_013SkkmMigration implements BaseMigration
{
    public function up($db)
    {
        $table = Skkm::TABLE;
        $id = Skkm::ID;
        $nim = Skkm::NIM;
        $prestasiId = Skkm::PRESTASI_ID;
        $certificateNumber = Skkm::CERTIFICATE_NUMBER;
        $level = Skkm::LEVEL;
        $certificatePath = Skkm::CERTIFICATE_PATH;
        $point = Skkm::POINT;

        $tsql = "
            IF NOT EXISTS (
                SELECT *
                FROM sysobjects
                WHERE name = '$table' AND xtype = 'U'
            )
            BEGIN
                CREATE TABLE [$table] (
                    [$id] nvarchar PRIMARY KEY,
                    [$nim] nvarchar,
                    [$prestasiId] nvarchar UNIQUE,
                    [$certificateNumber] nvarchar UNIQUE,
                    [$level] nvarchar,
                    [$certificatePath] nvarchar,
                    [$point] int
                )
            END;
        ";

        return $db->prepare($tsql);
    }

    public function down($db)
    {
        $table = Skkm::TABLE;
        $tsql = "DROP TABLE IF EXISTS [$table]";
        return $db->prepare($tsql);
    }
}
