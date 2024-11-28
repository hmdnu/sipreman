<?php

use app\models\BaseMigration;
use app\models\StudyProgram;

class StudyProgramMigration extends BaseMigration
{
    public function up($db)
    {
        $table = StudyProgram::$table;
        $id = StudyProgram::$id;
        $studyProgramName = StudyProgram::$studyProgramName;
        $totalVictoryStudyProgram = StudyProgram::$totalVictoryStudyProgram;

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
                    [$totalVictoryStudyProgram] int
                )
            END;
        ";

        return sqlsrv_query($db, $tsql);
    }

    public function down($db)
    {
        $table = StudyProgram::$table;
        $tsql = "DROP TABLE IF EXISTS [$table]";
        return sqlsrv_query($db, $tsql);
    }
}
