<?php

use app\models\BaseMigration;
use app\models\Major;

class MajorMigration extends BaseMigration
{
    public function up($db)
    {
        $table = Major::$table;
        $id = Major::$id;
        $majorName = Major::$majorName;
        $totalMajorVictory = Major::$totalVictoryMajor;

        $tsql = "
            IF EXISTS (
                SELECT * 
                FROM sysobjects WHERE name = '$table' AND xtype = 'U' 
            )
            BEGIN
                CREATE TABLE $table (
                    $id nvarchar PRIMARY KEY,
                    $majorName nvarchar,
                    $totalMajorVictory int,
                )
            END;";

        return sqlsrv_query($db, $tsql);
    }

    public function down($db)
    {
        $table = Major::$table;
        $tsql = "DROP TABLE IF EXISTS $table;";
        return sqlsrv_query($db, $tsql);
    }
}