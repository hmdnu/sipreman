<?php

use app\cores\Blueprint;
use app\cores\dbal\Column;
use app\cores\Schema;
use app\models\BaseMigration;
use app\models\Migration;

class m_022AttachmentRelation extends BaseMigration implements Migration
{
    public function up(): bool
    {

        return $this->construct->alterTable("attachment", function (Column $table) {
            $table
                ->addForeignKey("loa_id", "fk_loa_id_attachment")
                ->reference("loa", "id")
                ->cascade();
        })->execute();
    }

    public function down(): bool
    {
        return true;
    }
}
