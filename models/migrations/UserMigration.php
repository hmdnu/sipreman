<?php

use app\models\BaseMigration;
use app\models\users\User;

class UserMigration extends BaseMigration
{
    public function up($db)
    {
        $table = User::$table;
        $id = User::$id;
        $noInduk = User::$noInduk;
        $password = User::$password;

        $tsql = "
            IF NOT EXIST (
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
        $table = User::$table;
        $tsql = "DROP TABLE IF EXISTS [$table]";
        return sqlsrv_query($db, $tsql);
    }

}