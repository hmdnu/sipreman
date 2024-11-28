<?php

use app\models\BaseMigration;
use app\models\championLevel\RegencyLevel;

class m_012RegencyChampMigration extends BaseMigration
{
    public function up($db)
    {
        $table = RegencyLevel::TABLE;
        $id = RegencyLevel::ID;
        $nim = RegencyLevel::NIM;

        $tsql = "
            IF NOT EXISTS (
                SELECT *
                FROM sysobjects
                WHERE name = '$table' AND xtype = 'U'
            )
            BEGIN
                CREATE TABLE [$table] (
                    [$id] nvarchar PRIMARY KEY,
                    [$nim] nvarchar UNIQUE,
                )
            END;
        ";

        return sqlsrv_query($db, $tsql);
    }

    public function down($db)
    {
        $table = RegencyLevel::TABLE;
        $tsql = "DROP TABLE IF EXISTS [$table]";
        return sqlsrv_query($db, $tsql);
    }
}
