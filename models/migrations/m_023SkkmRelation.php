<?php

use app\models\BaseMigration;

class m_023SkkmRelation extends BaseMigration
{
    public function up($db)
    {
        $tsql = "ALTER TABLE [skkm] ADD FOREIGN KEY ([prestasi_id]) REFERENCES [prestasi] ([id])
                ALTER TABLE [skkm] ADD FOREIGN KEY ([nim]) REFERENCES [student] ([nim])";

        return sqlsrv_query($db, $tsql);
    }

    public function down($db)
    {
    }


}