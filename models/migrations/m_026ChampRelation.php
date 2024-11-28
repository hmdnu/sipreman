<?php


use app\models\BaseMigration;

class m_026ChampRelation extends BaseMigration
{
    public function up($db)
    {
        $tsql = "ALTER TABLE [international_level] ADD FOREIGN KEY ([nim]) REFERENCES [student] ([nim])
                ALTER TABLE [national_level] ADD FOREIGN KEY ([nim]) REFERENCES [student] ([nim])
                ALTER TABLE [province_level] ADD FOREIGN KEY ([nim]) REFERENCES [student] ([nim])
                ALTER TABLE [regency_level] ADD FOREIGN KEY ([nim]) REFERENCES [student] ([nim]);";

        return sqlsrv_query($db, $tsql);
    }

    public function down($db)
    {

    }


}