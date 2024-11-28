<?php


use app\models\BaseMigration;
use app\models\prestasiCore\PrestasiStats;

class PrestasiStatisticMigration extends BaseMigration
{
    public function up($db)
    {
        $table = PrestasiStats::$table;
        $id = PrestasiStats::$id;
        $majorId = PrestasiStats::$majorId;
        $studyProgramId = PrestasiStats::$studyProgramId;
        $totalVictoryAll = PrestasiStats::$totalVictoryAll;
        $year = PrestasiStats::$year;

        $tsql = "
            IF NOT EXISTS (
                SELECT *
                FROM sysobjects
                WHERE name = '$table' AND xtype = 'U'
            )
            BEGIN
                CREATE TABLE [$table] (
                    [$id] nvarchar PRIMARY KEY,
                    [$majorId] nvarchar,
                    [$studyProgramId] nvarchar,
                    [$totalVictoryAll] int,
                    [$year] int
                )
            END;
        ";

        return sqlsrv_query($db, $tsql);
    }

    public function down($db)
    {
        $table = PrestasiStats::$table;
        $tsql = "DROP TABLE IF EXISTS [$table]";
        return sqlsrv_query($db, $tsql);
    }
}
