<?php


use app\models\BaseMigration;
use app\models\prestasiCore\Loa;

class m_005LoaMigration extends BaseMigration
{
    public function up($db)
    {
        $table = Loa::TABLE;
        $id = Loa::ID;
        $loaNumber = Loa::LOA_NUMBER;
        $date = Loa::DATE;
        $loaPdfPath = Loa::PDF_PATH;

        $tsql = "
            IF NOT EXISTS (
                SELECT *
                FROM sysobjects
                WHERE name = '$table' AND xtype = 'U'
            )
            BEGIN
                CREATE TABLE $table (
                    [$id] nvarchar PRIMARY KEY,
                    [$loaNumber] nvarchar UNIQUE,
                    [$date] date,
                    [$loaPdfPath] nvarchar
                )
           END;";

        return sqlsrv_query($db, $tsql);
    }

    public function down($db)
    {
        $table = Loa::TABLE;
        $tsql = "DROP TABLE IF EXISTS $table";
        return sqlsrv_query($db, $tsql);
    }
}