<?php

use app\cores\dbal\ddl\Alteration;
use app\models\BaseMigration;
use app\models\Migration;


class m_017AdminRelation extends BaseMigration implements Migration
{
    public function up(): bool
    {
        return $this->construct->alter("admin", function (Alteration $table) {
            $table
                ->addForeignKey("nip", "fk_nip_admin")
                ->reference("user","no_induk");
        })->execute();
    }

    public function down(): bool
    {
        return true;
    }
}
