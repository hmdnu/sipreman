<?php


use app\core\Database;
use app\core\Migration;
use app\models\users\User;

class UserMigration
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
                CREATE TABLE $table (
                    $id VARCHAR(16) PRIMARY KEY NOT NULL,
                    $noInduk VARCHAR(225) UNIQUE NOT NULL,
                    $password VARCHAR(255) NOT NULL
                ) 
            END;";

        return sqlsrv_query($db, $tsql);
    }

    public function down(): void
    {
        Database::getConnection()->prepare("DROP TABLE IF EXISTS user")->execute();
    }

}