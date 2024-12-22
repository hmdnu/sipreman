<?php

use app\cores\dbal\ddl\Alteration;
use app\models\BaseMigration;
use app\models\Migration;

class m_020PrestasiRelation extends BaseMigration implements Migration
{
    public function up(): bool
    {

        return $this->construct->alter("prestasi", function (Alteration $table) {
            $table
                ->addForeignKey("attachment_id", "fk_attachment_id_prestasi")
                ->reference("attachment", "id")
                ->onUpdate("cascade")
                ->onDelete("cascade");

            $table
                ->addForeignKey("supervisor_id", "fk_supervisor_id_prestasi")
                ->reference("lecturer", "nidn")
                ->onUpdate("cascade")
                ->onDelete("cascade");
        })->execute();
    }

    public function down(): bool
    {
        return true;
    }
}
