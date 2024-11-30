<?php

namespace app\models\migrationBackup;

use app\models\BaseMigration;
use app\models\prestasiCore\Prestasi;

class m_008PrestasiMigration implements BaseMigration
{
    public function up($db)
    {
        $table = Prestasi::TABLE;
        $id = Prestasi::ID;
        $attachmentId = Prestasi::ATTACHMENT_ID;
        $competitionName = Prestasi::COMPETITION_NAME;
        $categoryName = Prestasi::CATEGORY_NAME;
        $competitionLevel = Prestasi::COMPETITION_LEVEL;
        $place = Prestasi::PLACE;
        $dateStartCompetition = Prestasi::DATE_START_COMPETITION;
        $dateEndCompetition = Prestasi::DATE_END_COMPETITION;
        $competitionSource = Prestasi::COMPETITION_SOURCE;
        $totalCollegeAttended = Prestasi::TOTAL_COLLEGE;
        $totalParticipant = Prestasi::TOTAL_PARTICIPANT;
        $supervisorId = Prestasi::SUPERVISOR_ID;
        $isValidate = Prestasi::IS_VALIDATE;

        $tsql = "
            IF NOT EXISTS (
                SELECT *
                FROM sysobjects
                WHERE name = '$table' AND xtype = 'U'
            )
            BEGIN
                CREATE TABLE [$table] (
                    [$id] nvarchar PRIMARY KEY,
                    [$attachmentId] nvarchar UNIQUE,
                    [$competitionName] nvarchar,
                    [$categoryName] nvarchar,
                    [$competitionLevel] nvarchar,
                    [$place] nvarchar,
                    [$dateStartCompetition] date,
                    [$dateEndCompetition] date,
                    [$competitionSource] nvarchar,
                    [$totalCollegeAttended] int,
                    [$totalParticipant] int,
                    [$supervisorId] nvarchar UNIQUE,
                    [$isValidate] tinyint
                )
            END;
        ";

        return $db->prepare($tsql);
    }

    public function down($db)
    {
        $table = Prestasi::TABLE;
        $tsql = "DROP TABLE IF EXISTS [$table]";
        return $db->prepare($tsql);
    }
}
