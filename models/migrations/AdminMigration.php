<?php

use app\core\Database;
use app\models\users\Admin;

class AdminMigration
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
                $id VARCHAR(16) PRIMARY KEY NOT NULL,
                $nip VARCHAR(225) UNIQUE NOT NULL,
                $name VARCHAR(225) NOT NULL,
                CONSTRAINT FK_admin_$nip FOREIGN KEY ($nip) REFERENCES [user] (no_induk)
            )
        END;";

        return sqlsrv_query($db, $tsql);
    }

    public function down(): void
    {
        $table = Admin::$table;
        Database::getConnection()->prepare("DROP TABLE IF EXISTS $table")->execute();
    }

}