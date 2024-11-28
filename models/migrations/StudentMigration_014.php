<?php


use app\models\BaseMigration;
use app\models\users\Student;

class StudentMigration_014 extends BaseMigration
{
    public function up($db)
    {
        $table = Student::$table;
        $id = Student::$id;
        $nim = Student::$nim;
        $name = Student::$name;
        $prestasiId = Student::$prestasiId;
        $studyProgramId = Student::$studyProgramId;
        $majorId = Student::$majorId;

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
                    [$nim] nvarchar,
                    [$prestasiId] nvarchar,
                    [$studyProgramId] nvarchar,
                    [$majorId] nvarchar,
                )
            END;";

        return sqlsrv_query($db, $tsql);
    }

    public function down($db)
    {
        $table = Student::$table;
        $tsql = "DROP TABLE IF EXIST $table;";

        return sqlsrv_query($db, $tsql);
    }
}