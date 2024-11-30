<?php

use app\models\BaseMigration;
use app\models\users\Admin;
use app\models\users\User;

class m_017AdminRelation implements BaseMigration
{
    public function up($db)
    {
        $adminTable = Admin::TABLE;
        $nip = Admin::NIP;
        $userTable = User::TABLE;
        $noInduk = User::NO_INDUK;

        $tsql = "ALTER TABLE [$adminTable] ADD FOREIGN KEY ([$nip]) REFERENCES [$userTable] ([$noInduk])";

        return $db->prepare($tsql);
    }

    public function down($db)
    {

    }
}