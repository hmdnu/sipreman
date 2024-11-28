<?php


use app\models\BaseMigration;

class m_024PrestasiStatisticRelation extends BaseMigration
{
    public function up($db)
    {
        $tsql = "ALTER TABLE [prestasi_statistic] ADD FOREIGN KEY ([study_program_id]) REFERENCES [study_program] ([id])
                ALTER TABLE [prestasi_statistic] ADD FOREIGN KEY ([major_id]) REFERENCES [major] ([id]);";
        return sqlsrv_query($db, $tsql);
    }

    public function down($db)
    {
    }

}