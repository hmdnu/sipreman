<?php

namespace app\models\migrationBackup;

use app\models\BaseMigration;
use app\models\championLevel\NationalLevel;

class m_007NationalChampMigration implements BaseMigration
{
    public function up($db)
    {
        $table = NationalLevel::TABLE;
        $id = NationalLevel::ID;
        $nim = NationalLevel::NIM;

        $tsql = "
            IF NOT EXISTS (
                SELECT *
                FROM sysobjects
                WHERE name = '$table' AND xtype = 'U'
            )
            BEGIN
                CREATE TABLE $table (
                    [$id] nvarchar PRIMARY KEY,
                    [$nim] nvarchar
                )
            END;
        ";

        return $db->prepare($tsql);
    }

    public function down($db)
    {
        $table = NationalLevel::TABLE;
        $tsql = "DROP TABLE IF EXISTS $table";
        return $db->prepare($tsql);
    }
}