<?php

namespace app\models\migrationBackup;

use app\models\BaseMigration;
use app\models\championLevel\ProvinceLevel;

class m_011ProvinceChampMigration implements BaseMigration
{
    public function up($db)
    {
        $table = ProvinceLevel::TABLE;
        $id = ProvinceLevel::ID;
        $nim = ProvinceLevel::NIM;

        $tsql = "
            IF NOT EXISTS (
                SELECT *
                FROM sysobjects
                WHERE name = '$table' AND xtype = 'U'
            )
            BEGIN
                CREATE TABLE [$table] (
                    [$id] nvarchar PRIMARY KEY,
                    [$nim] nvarchar UNIQUE,
                )
            END;
        ";

        return $db->prepare($tsql);
    }

    public function down($db)
    {
        $table = ProvinceLevel::TABLE;
        $tsql = "DROP TABLE IF EXISTS [$table]";
        return $db->prepare($tsql);
    }
}
