<?php

namespace app\models\migrationBackup;

use app\models\BaseMigration;

class m_023SkkmRelation implements BaseMigration
{
    public function up($db)
    {
        $tsql = "ALTER TABLE [skkm] ADD FOREIGN KEY ([prestasi_id]) REFERENCES [prestasi] ([id])
                ALTER TABLE [skkm] ADD FOREIGN KEY ([nim]) REFERENCES [student] ([nim])";

        return $db->prepare($tsql);
    }

    public function down($db)
    {
    }


}