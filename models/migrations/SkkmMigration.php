<?php

use app\models\BaseMigration;
use app\models\prestasiCore\Skkm;

class SkkmMigration extends BaseMigration
{
    public function up($db)
    {
        $table = Skkm::$table;
        $id = Skkm::$id;
        $nim = Skkm::$nim;
        $prestasiId = Skkm::$prestasiId;
        $certificateNumber = Skkm::$certificateNumber;
        $level = Skkm::$level;
        $certificatePath = Skkm::$certificatePath;
        $point = Skkm::$point;

        $tsql = "
            IF NOT EXISTS (
                SELECT *
                FROM sysobjects
                WHERE name = '$table' AND xtype = 'U'
            )
            BEGIN
                CREATE TABLE [$table] (
                    [$id] nvarchar PRIMARY KEY,
                    [$nim] nvarchar,
                    [$prestasiId] nvarchar,
                    [$certificateNumber] nvarchar,
                    [$level] nvarchar,
                    [$certificatePath] nvarchar,
                    [$point] int
                )
            END;
        ";

        return sqlsrv_query($db, $tsql);
    }

    public function down($db)
    {
        $table = Skkm::$table;
        $tsql = "DROP TABLE IF EXISTS [$table]";
        return sqlsrv_query($db, $tsql);
    }
}
