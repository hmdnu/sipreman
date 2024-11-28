<?php

use app\models\BaseMigration;

class m_021PrestasiTeamRelation extends BaseMigration
{
    public function up($db)
    {
        $tsql = "ALTER TABLE [prestasi_team] ADD FOREIGN KEY ([nim]) REFERENCES [student] ([nim])
                ALTER TABLE [prestasi_team] ADD FOREIGN KEY ([prestasi_id]) REFERENCES [prestasi] ([id])
                ALTER TABLE [prestasi_team] ADD FOREIGN KEY ([supervisor_id]) REFERENCES [lecturer] ([nidn])";

        return sqlsrv_query($db, $tsql);
    }

    public function down($db)
    {

    }
}