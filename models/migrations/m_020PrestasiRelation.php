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
            $table->alterAddForeignKey("supervisor_id", "lecturer", "nidn", "fk_supervisor_id_prestasi");
            $table->alterAddForeignKey("nim", "student", "nim", "fk_nim_prestasi");
        });
    }

    public function down(): array
    {
        return [];
    }

}