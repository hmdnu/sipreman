<?php

use app\models\BaseMigration;
use app\models\Major;

class m_006MajorMigration extends BaseMigration
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

        return sqlsrv_query($db, $tsql);
    }

    public function down($db)
    {
        $table = Major::TABLE;
        $tsql = "DROP TABLE IF EXISTS $table;";
        return sqlsrv_query($db, $tsql);
    }
}