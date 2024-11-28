<?php


use app\models\BaseMigration;
use app\models\users\Student;

class m_014StudentMigration extends BaseMigration
{
    public function up($db)
    {
        $table = Student::TABLE;
        $id = Student::ID;
        $nim = Student::NIM;
        $name = Student::NAME;
        $prestasiId = Student::PRESTASI_ID;
        $studyProgramId = Student::STUDY_PROGRAM_ID;
        $majorId = Student::MAJOR_ID;

        $tsql = "
            IF NOT EXISTS (
                SELECT * 
                FROM sysobjects 
                WHERE name = '$table' AND xtype = 'U'
            )
            BEGIN
                CREATE TABLE $table (
                    [$id] nvarchar PRIMARY KEY,
                    [$name] nvarchar,
                    [$nim] nvarchar UNIQUE,
                    [$prestasiId] nvarchar UNIQUE,
                    [$studyProgramId] nvarchar UNIQUE,
                    [$majorId] nvarchar UNIQUE,
                )
            END;";

        return sqlsrv_query($db, $tsql);
    }

    public function down($db)
    {
        $table = Student::TABLE;
        $tsql = "DROP TABLE IF EXIST $table;";

        return sqlsrv_query($db, $tsql);
    }
}