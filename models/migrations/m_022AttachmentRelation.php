<?php

use app\models\BaseMigration;

class m_022AttachmentRelation extends BaseMigration
{
    public function up($db)
    {
        $tsql = "ALTER TABLE [attachment] ADD FOREIGN KEY ([loa_id]) REFERENCES [loa] ([loa_number])";
        return sqlsrv_query($db, $tsql);
    }

    public function down($db)
    {
    }
}