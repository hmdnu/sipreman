<?php


namespace app\models\migrationBackup;

use app\models\BaseMigration;

class m_026ChampRelation implements BaseMigration
{
    public function up($db)
    {
        $tsql = "ALTER TABLE [international_level] ADD FOREIGN KEY ([nim]) REFERENCES [student] ([nim])
                ALTER TABLE [national_level] ADD FOREIGN KEY ([nim]) REFERENCES [student] ([nim])
                ALTER TABLE [province_level] ADD FOREIGN KEY ([nim]) REFERENCES [student] ([nim])
                ALTER TABLE [regency_level] ADD FOREIGN KEY ([nim]) REFERENCES [student] ([nim]);";

        return $db->prepare($tsql);
    }

    public function down($db)
    {

    }


}