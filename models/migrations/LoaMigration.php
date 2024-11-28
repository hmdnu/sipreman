<?php


use app\models\BaseMigration;
use app\models\prestasiCore\Loa;

class LoaMigration extends BaseMigration
{
    public function up($db)
    {
        $table = Loa::$table;
        $id = Loa::$id;
        $loaNumber = Loa::$loaNumber;
        $date = Loa::$date;
        $loaPdfPath = Loa::$pdfPath;

        $tsql = "
            IF NOT EXISTS (
                SELECT *
                FROM sysobjects
                WHERE name = '$table' AND xtype = 'U'
            )
            BEGIN
                CREATE TABLE $table (
                    [$id] nvarchar PRIMARY KEY,
                    [$loaNumber] nvarchar,
                    [$date] date,
                    [$loaPdfPath] nvarchar
                )
           END;";

        return sqlsrv_query($db, $tsql);
    }

    public function down($db)
    {
        $table = Loa::$table;
        $tsql = "DROP TABLE IF EXISTS $table";
        return sqlsrv_query($db, $tsql);
    }
}