<?php


use app\core\Database;
use app\models\users\Lecturer;
use app\models\users\User;

class LecturerMigration
{
    public function up($db)
    {
        $table = Lecturer::$table;
        $id = Lecturer::$id;
        $nidn = Lecturer::$nidn;
        $nama = Lecturer::$nama;
        $noInduk = User::$noInduk;
//        $db = Database::getConnection();

        $tsql = "
            IF NOT EXISTS (
                SELECT * 
                FROM sysobjects 
                WHERE name = '$table' AND xtype = 'U'
            )
            BEGIN
                CREATE TABLE $table (
                    $id VARCHAR(16) PRIMARY KEY,
                    $nidn VARCHAR(255) UNIQUE NOT NULL,
                    $nama VARCHAR(255) NOT NULL,
                    CONSTRAINT FK_User_$nidn FOREIGN KEY ($nidn) REFERENCES [user] ($noInduk)
                )
            END;";

        return sqlsrv_query($db, $tsql);
    }

    public function down(): void
    {
        $tableName = Lecturer::$tableName;
        Database::getConnection()->prepare("DROP TABLE IF EXIST $tableName")->execute();
    }

}