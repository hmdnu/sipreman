<?php

use app\models\BaseMigration;
use app\models\users\Admin;

class AdminMigration_001 extends BaseMigration
{
    public function up($db)
    {
        $table = Admin::$table;
        $id = Admin::$id;
        $nip = Admin::$nip;
        $name = Admin::$name;

        $tsql = "
            IF NOT EXISTS (
            SELECT * 
            FROM sysobjects 
            WHERE name = '$table' AND xtype = 'U')
        BEGIN
            CREATE TABLE $table (
                [$id] nvarchar PRIMARY KEY,
                [$nip] nvarchar UNIQUE,
                [$name] nvarchar
            )
        END;";

        return sqlsrv_query($db, $tsql);
    }

    public function down($db)
    {
        $table = Admin::$table;
        $tsql = "DROP TABLE IF EXISTS $table;";
        return sqlsrv_query($db, $tsql);
    }
}