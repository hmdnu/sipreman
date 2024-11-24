<?php


use app\core\Database;
use app\core\Migration;
use app\models\prestasiCore\Prestasi;
use app\models\users\Student;

class MahasiswaMigration
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
        $tablePrestasi = Prestasi::$table;
        $tableProdi = "prodi";
        $tableJurusan = "jurusan";

//        $db = Database::getConnection();

        $tsql = "
            IF NOT EXISTS (
                SELECT * 
                FROM sysobjects 
                WHERE name = '$table' AND xtype = 'U'
            )
            BEGIN
                CREATE TABLE $table (
                    $id VARCHAR(16) PRIMARY KEY,
                    $name VARCHAR(225) NOT NULL,
                    $nim VARCHAR(225) NOT NULL,
                    $prestasiId VARCHAR(16) NOT NULL,
                    $studyProgramId VARCHAR(16) NOT NULL,
                    $majorId VARCHAR(16) NOT NULL,
                    CONSTRAINT FK_User_$nim FOREIGN KEY ($nim) REFERENCES [user] (no_induk),
                    CONSTRAINT FK_Prestasi_$prestasiId FOREIGN KEY ($prestasiId) REFERENCES $tablePrestasi (id),
                    CONSTRAINT FK_Prodi_$studyProgramId FOREIGN KEY ($studyProgramId) REFERENCES $tableProdi (id),
                    CONSTRAINT FK_Jurusan_$majorId FOREIGN KEY ($majorId) REFERENCES $tableJurusan (id)
                )
            END;";

        return sqlsrv_query($db, $tsql);
    }

    public function down(): void
    {
        $table = Student::$table;
        Database::getConnection()->prepare("DROP TABLE IF EXIST $table ;");
    }
}