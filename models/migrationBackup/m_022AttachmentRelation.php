<?php

namespace app\models\migrationBackup;

use app\models\BaseMigration;

class m_022AttachmentRelation implements BaseMigration
{
    public function up($db)
    {
        $tsql = "ALTER TABLE [attachment] ADD FOREIGN KEY ([loa_id]) REFERENCES [loa] ([loa_number])";
        return $db->prepare($tsql);
    }

    public function down($db)
    {
    }
}