<?php


use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseMigration;

class m_020PrestasiRelation implements BaseMigration
{
    public function up(): array
    {
        return Schema::alterTable("prestasi", function (Blueprint $table) {
            $table->alterAddForeignKey("attachment_id", "attachment", "id", "fk_attachment_id_prestasi");
            $table->alterAddForeignKey("supervisor_id", "lecturer", "nidnn", "fk_supervisor_id_prestasi");
        });
    }

    public function down(): array
    {
        return [];
    }

}