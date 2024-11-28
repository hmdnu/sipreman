<?php

use app\models\BaseMigration;
use app\models\users\Lecturer;
use app\models\users\User;

class LecturerMigration_004 extends BaseMigration
{
    public function up($db)
    {
        $table = Lecturer::$table;
        $id = Lecturer::$id;
        $nidn = Lecturer::$nidn;
        $nama = Lecturer::$nama;
        $noInduk = User::$noInduk;

        $tsql = "
            IF NOT EXISTS (
                SELECT * 
                FROM sysobjects 
                WHERE name = '$table' AND xtype = 'U'
            )
            BEGIN
                CREATE TABLE $table (
                    [$id] VARCHAR(16) PRIMARY KEY,
                    [$nidn] VARCHAR(255) UNIQUE,
                    [$nama] VARCHAR(255),
                )
            END;";

        return sqlsrv_query($db, $tsql);
    }

    public function down($db)
    {
        $table = Lecturer::$table;
        $tsql = "DROP TABLE IF EXIST $table;";

        return sqlsrv_query($db, $tsql);
    }

}