<?php


use app\models\BaseMigration;
use app\models\prestasiCore\Prestasi;
use app\models\prestasiCore\PrestasiTeam;

class m_010PrestasiTeamMigration extends BaseMigration
{
    public function up($db)
    {
        $table = PrestasiTeam::TABLE;
        $id = PrestasiTeam::ID;
        $isLeader = PrestasiTeam::IS_LEADER;
        $isMember = PrestasiTeam::IS_MEMBER;
        $supervisorId = PrestasiTeam::SUPERVISOR_ID;

        $tsql = "
            IF NOT EXISTS (
                SELECT *
                FROM sysobjects
                WHERE name = '$table' AND xtype = 'U'
            )
            BEGIN
               CREATE TABLE [prestasi_team] (
                  [id] nvarchar PRIMARY KEY,
                  [nim] nvarchar UNIQUE,
                  [prestasi_id] nvarchar UNIQUE,
                  [is_leader] tinyint,
                  [is_member] tinyint,
                  [supervisor_id] nvarchar UNIQUE
              )
            END;
        ";

        return sqlsrv_query($db, $tsql);
    }

    public function down($db)
    {
        $table = PrestasiTeam::TABLE;
        $tsql = "DROP TABLE IF EXISTS [$table]";
        return sqlsrv_query($db, $tsql);
    }
}
