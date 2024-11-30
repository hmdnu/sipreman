<?php


namespace app\models\migrationBackup;

use app\models\BaseMigration;

class m_024PrestasiStatisticRelation implements BaseMigration
{
    public function up($db)
    {
        $tsql = "ALTER TABLE [prestasi_statistic] ADD FOREIGN KEY ([study_program_id]) REFERENCES [study_program] ([id])
                ALTER TABLE [prestasi_statistic] ADD FOREIGN KEY ([major_id]) REFERENCES [major] ([id]);";
        return $db->prepare($tsql);
    }

    public function down($db)
    {
    }

}