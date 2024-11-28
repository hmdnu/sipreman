<?php


use app\models\BaseMigration;
use app\models\prestasiCore\PrestasiTeam;

class PrestasiTeamMigration_010 extends BaseMigration
{
    public function up($db)
    {
        $table = PrestasiTeam::$table;
        $id = PrestasiTeam::$id;
        $isLeader = PrestasiTeam::$isLeader;
        $isMember = PrestasiTeam::$isMember;
        $supervisorId = PrestasiTeam::$supervisorId;

        $tsql = "
            IF NOT EXISTS (
                SELECT *
                FROM sysobjects
                WHERE name = '$table' AND xtype = 'U'
            )
            BEGIN
                CREATE TABLE [$table] (
                    [$id] nvarchar PRIMARY KEY,
                    [$isLeader] bit,
                    [$isMember] bit,
                    [$supervisorId] nvarchar
                )
            END;
        ";

        return sqlsrv_query($db, $tsql);
    }

    public function down($db)
    {
        $table = PrestasiTeam::$table;
        $tsql = "DROP TABLE IF EXISTS [$table]";
        return sqlsrv_query($db, $tsql);
    }
}
