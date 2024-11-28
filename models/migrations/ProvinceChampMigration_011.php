<?php

use app\models\BaseMigration;
use app\models\championLevel\ProvinceLevel;

class ProvinceChampMigration_011 extends BaseMigration
{
    public function up($db)
    {
        $table = ProvinceLevel::$table;
        $id = ProvinceLevel::$id;
        $nim = ProvinceLevel::$nim;

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
        $table = ProvinceLevel::$table;
        $tsql = "DROP TABLE IF EXISTS [$table]";
        return sqlsrv_query($db, $tsql);
    }
}
