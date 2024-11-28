<?php

use app\models\BaseMigration;
use app\models\championLevel\RegencyLevel;

class RegencyChampMigration_012 extends BaseMigration
{
    public function up($db)
    {
        $table = RegencyLevel::$table;
        $id = RegencyLevel::$id;
        $nim = RegencyLevel::$nim;

        $tsql = "
            IF NOT EXISTS (
                SELECT *
                FROM sysobjects
                WHERE name = '$table' AND xtype = 'U'
            )
            BEGIN
                CREATE TABLE [$table] (
                    [$id] nvarchar PRIMARY KEY,
                    [$nim] nvarchar
                )
            END;
        ";

        return sqlsrv_query($db, $tsql);
    }

    public function down($db)
    {
        $table = RegencyLevel::$table;
        $tsql = "DROP TABLE IF EXISTS [$table]";
        return sqlsrv_query($db, $tsql);
    }
}
