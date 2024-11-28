<?php


use app\models\BaseMigration;

class m_025StudyProgramRelation extends BaseMigration
{
    public function up($db)
    {
        $tsql = "ALTER TABLE [study_program] ADD FOREIGN KEY ([major_id]) REFERENCES [major] ([id])";

        return sqlsrv_query($db, $tsql);
    }

    public function down($db)
    {
    }


}