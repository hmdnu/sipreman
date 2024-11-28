<?php

use app\models\BaseMigration;
use app\models\users\User;

class m_016UserMigration extends BaseMigration
{
    public function up($db)
    {
        $table = User::TABLE;
        $id = User::ID;
        $noInduk = User::NO_INDUK;
        $password = User::PASSWORD;

        $tsql = "
            IF NOT EXISTS (
                SELECT * 
                FROM sysobjects
                WHERE name = '$table' AND xtype = 'U'
            )
            BEGIN 
               CREATE TABLE [$table] (
                  [$id] nvarchar PRIMARY KEY,
                  [$noInduk] nvarchar UNIQUE,
                  [$password] nvarchar
                )
            END;";

        return sqlsrv_query($db, $tsql);
    }

    public function down($db)
    {
        $table = User::TABLE;
        $tsql = "DROP TABLE IF EXISTS [$table]";
        return sqlsrv_query($db, $tsql);
    }

}