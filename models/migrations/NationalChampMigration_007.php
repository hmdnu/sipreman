<?php

use app\models\BaseMigration;
use app\models\championLevel\NationalLevel;

class NationalChampMigration_007 extends BaseMigration
{
    public function up($db)
    {
        $table = NationalLevel::$table;
        $id = NationalLevel::$id;
        $nim = NationalLevel::$nim;

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

        return sqlsrv_query($db, $tsql);
    }

    public function down($db)
    {
        $table = NationalLevel::$table;
        $tsql = "DROP TABLE IF EXISTS $table";
        return sqlsrv_query($db, $tsql);
    }
}