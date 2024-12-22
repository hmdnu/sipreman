<?php

use app\cores\dbal\ddl\Alteration;
use app\models\BaseMigration;
use app\models\Migration;

class m_022AttachmentRelation extends BaseMigration implements Migration
{
    public function up(): bool
    {

        return $this->construct->alter("attachment", function (Alteration $table) {
            $table
                ->addForeignKey("loa_id", "fk_loa_id_attachment")
                ->reference("loa", "id")
                ->onUpdate("cascade")
                ->onDelete("cascade");
        })->execute();
    }

    public function down(): bool
    {
        return true;
    }
}
