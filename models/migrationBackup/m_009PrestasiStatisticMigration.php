<?php


namespace app\models\migrationBackup;

use app\models\BaseMigration;
use app\models\prestasiCore\PrestasiStats;

class m_009PrestasiStatisticMigration implements BaseMigration
{
    public function up($db)
    {
        $table = PrestasiStats::TABLE;
        $id = PrestasiStats::ID;
        $majorId = PrestasiStats::MAJOR_ID;
        $studyProgramId = PrestasiStats::STUDY_PROGRAM_ID;
        $totalVictoryAll = PrestasiStats::TOTAL_VICTORY_ALL;
        $year = PrestasiStats::YEAR;

        $tsql = "
            IF NOT EXISTS (
                SELECT *
                FROM sysobjects
                WHERE name = '$table' AND xtype = 'U'
            )
            BEGIN
                CREATE TABLE [$table] (
                    [$id] nvarchar PRIMARY KEY,
                    [$majorId] nvarchar UNIQUE,
                    [$studyProgramId] nvarchar UNIQUE,
                    [$totalVictoryAll] int,
                    [$year] int
                )
            END;
        ";

        return $db->prepare($tsql);
    }

    public function down($db)
    {
        $table = PrestasiStats::TABLE;
        $tsql = "DROP TABLE IF EXISTS [$table]";
        return $db->prepare($tsql);
    }
}
