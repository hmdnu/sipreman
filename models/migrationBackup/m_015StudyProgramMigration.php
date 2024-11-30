<?php

namespace app\models\migrationBackup;

use app\models\BaseMigration;
use app\models\StudyProgram;

class m_015StudyProgramMigration implements BaseMigration
{
    public function up($db)
    {
        $table = StudyProgram::TABLE;
        $id = StudyProgram::ID;
        $studyProgramName = StudyProgram::STUDY_PROGRAM_NAME;
        $totalVictoryStudyProgram = StudyProgram::TOTAL_VICTORY_STUDY_PROGRAM;
        $majorId = StudyProgram::MAJOR_ID;

        $tsql = "
            IF NOT EXISTS (
                SELECT *
                FROM sysobjects
                WHERE name = '$table' AND xtype = 'U'
            )
            BEGIN
                CREATE TABLE [$table] (
                    [$id] nvarchar PRIMARY KEY,
                    [$studyProgramName] nvarchar,
                    [$majorId] nvarchar UNIQUE,
                    [$totalVictoryStudyProgram] int
                )
            END;
        ";

        return $db->prepare($tsql);
    }

    public function down($db)
    {
        $table = StudyProgram::TABLE;
        $tsql = "DROP TABLE IF EXISTS [$table]";
        return $db->prepare($tsql);
    }
}
