<?php

use app\models\BaseMigration;
use app\models\users\Admin;

class m_001AdminMigration extends BaseMigration
{
    public function up($db)
    {
        $table = Admin::TABLE;
        $id = Admin::ID;
        $nip = Admin::NIP;
        $name = Admin::NAME;

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
        $table = Admin::TABLE;
        $tsql = "DROP TABLE IF EXISTS $table;";
        return sqlsrv_query($db, $tsql);
    }
}