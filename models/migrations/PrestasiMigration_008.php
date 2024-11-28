<?php

use app\models\BaseMigration;
use app\models\prestasiCore\Prestasi;

class PrestasiMigration_008 extends BaseMigration
{
    public function up($db)
    {
        $table = Prestasi::$table;
        $id = Prestasi::$id;
        $attachmentId = Prestasi::$attachmentId;
        $competitionName = Prestasi::$competitionName;
        $categoryName = Prestasi::$categoryName;
        $competitionLevel = Prestasi::$competitionLevel;
        $place = Prestasi::$place;
        $dateStartCompetition = Prestasi::$dateStartCompetition;
        $dateEndCompetition = Prestasi::$dateEndCompetition;
        $competitionSource = Prestasi::$competitionSource;
        $totalCollegeAttended = Prestasi::$totalCollegeAttended;
        $totalParticipant = Prestasi::$totalParticipant;
        $supervisorId = Prestasi::$supervisorId;
        $isValidate = Prestasi::$isValidate;

        $tsql = "
            IF NOT EXISTS (
                SELECT *
                FROM sysobjects
                WHERE name = '$table' AND xtype = 'U'
            )
            BEGIN
                CREATE TABLE [$table] (
                    [$id] nvarchar PRIMARY KEY,
                    [$attachmentId] nvarchar,
                    [$competitionName] nvarchar,
                    [$categoryName] nvarchar,
                    [$competitionLevel] nvarchar,
                    [$place] nvarchar,
                    [$dateStartCompetition] date,
                    [$dateEndCompetition] date,
                    [$competitionSource] nvarchar,
                    [$totalCollegeAttended] int,
                    [$totalParticipant] int,
                    [$supervisorId] nvarchar,
                    [$isValidate] tinyint
                )
            END;
        ";

        return sqlsrv_query($db, $tsql);
    }

    public function down($db)
    {
        $table = Prestasi::$table;
        $tsql = "DROP TABLE IF EXISTS [$table]";
        return sqlsrv_query($db, $tsql);
    }
}
