<?php


use app\models\BaseMigration;
use app\models\championLevel\InternationalLevel;

class InternationalChampMigration extends BaseMigration
{
    public function up($db)
    {
        $table = InternationalLevel::$table;
        $id = InternationalLevel::$id;
        $nim = InternationalLevel::$nim;

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
        $table = InternationalLevel::$table;
        $tsql = "DROP TABLE IF EXISTS $table";
        return sqlsrv_query($db, $tsql);
    }

}