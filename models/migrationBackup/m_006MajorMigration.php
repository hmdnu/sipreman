<?php

namespace app\models\migrationBackup;

use app\models\BaseMigration;
use app\models\Major;

class m_006MajorMigration implements BaseMigration
{
    public function up($db)
    {
        $table = Major::TABLE;
        $id = Major::ID;
        $majorName = Major::MAJOR_NAME;
        $totalMajorVictory = Major::TOTAL_VICTORY_MAJOR;

        $tsql = "
            IF NOT EXISTS (
                SELECT * 
                FROM sysobjects WHERE name = '$table' AND xtype = 'U' 
            )
            BEGIN
                CREATE TABLE $table (
                    [$id] nvarchar PRIMARY KEY,
                    [$majorName] nvarchar,
                    [$totalMajorVictory] int,
                )
            END;";

        return $db->prepare($tsql);
    }

    public function down($db)
    {
        $table = Major::TABLE;
        $tsql = "DROP TABLE IF EXISTS $table;";
        return $db->prepare($tsql);
    }
}