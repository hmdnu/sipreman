<?php


namespace app\models\migrationBackup;

use app\models\BaseMigration;

class m_025StudyProgramRelation implements BaseMigration
{
    public function up($db)
    {
        $tsql = "ALTER TABLE [study_program] ADD FOREIGN KEY ([major_id]) REFERENCES [major] ([id])";

        return $db->prepare($tsql);
    }

    public function down($db)
    {
    }


}