<?php


namespace app\models\migrationBackup;

use app\models\BaseMigration;
use app\models\championLevel\InternationalLevel;

class m_003InternationalChampMigration implements BaseMigration
{
    public function up($db)
    {
        $table = InternationalLevel::TABLE;
        $id = InternationalLevel::ID;
        $nim = InternationalLevel::NIM;

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
        $table = InternationalLevel::TABLE;
        $tsql = "DROP TABLE IF EXISTS $table";
        return $db->prepare($tsql);
    }

}