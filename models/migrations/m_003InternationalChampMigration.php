<?php


use app\models\BaseMigration;
use app\models\championLevel\InternationalLevel;

class m_003InternationalChampMigration extends BaseMigration
{
    public function up($db)
    {
        $table = InternationalLevel::TABLE;
        $id = InternationalLevel::ID;
        $nim = InternationalLevel::NIM;

        $tsql = "
            IF NOT EXISTS (
                SELECT *
                FROM sysobjects
                WHERE name = '$table' AND xtype = 'U'
            )
            BEGIN
                CREATE TABLE $table (
                    [$id] nvarchar PRIMARY KEY,
                    [$nim] nvarchar
                )
            END;
        ";

        return sqlsrv_query($db, $tsql);
    }

    public function down($db)
    {
        $table = InternationalLevel::TABLE;
        $tsql = "DROP TABLE IF EXISTS $table";
        return sqlsrv_query($db, $tsql);
    }

}