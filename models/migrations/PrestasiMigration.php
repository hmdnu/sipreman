<?php

use app\models\BaseMigration;
use app\models\prestasiCore\Prestasi;

class PrestasiMigration extends BaseMigration
{
    public function up($db)
    {
        $table = Prestasi::$table;
        $id = Prestasi::$id;
        $attachment_id = Prestasi::$attachment_id;
        $competition_name = Prestasi::$competition_name;
        $category = Prestasi::$category;
        $champion_level = Prestasi::$champion_level;
        $place = Prestasi::$place;
        $start_comp_date = Prestasi::$start_comp_date;
        $end_comp_date = Prestasi::$end_comp_date;
        $competition_source = Prestasi::$competition_source;
        $total_college_attended = Prestasi::$total_college_attended;
        $total_participant = Prestasi::$total_participant;
        $supervisor_id = Prestasi::$supervisor_id;
        $isValidate = Prestasi::$isValidate;

        $tsql = "
            IF NOT EXISTS (
                SELECT *
                FROM sysobjects
                WHERE name = '$table' AND xtype = 'U'
            )
            BEGIN
                CREATE TABLE $table (
                    [$id] nvarchar(255) PRIMARY KEY,
                    [$attachment_id] nvarchar(255),
                    [$competition_name] nvarchar(255),
                    [$category] nvarchar(255),
                    [$champion_level] nvarchar(255),
                    [$place] nvarchar(255),
                    [$start_comp_date] date,
                    [$end_comp_date] date,
                    [$competition_source] nvarchar(255),
                    [$total_college_attended] int,
                    [$total_participant] int,
                    [$supervisor_id] nvarchar(255),
                    [$isValidate] tinyint
                )
            END;
        ";

        return sqlsrv_query($db, $tsql);
    }

    public function down($db)
    {
        $table = Prestasi::$table;
        $tsql = "DROP TABLE IF EXISTS $table";
        return sqlsrv_query($db, $tsql);
    }
}
