<?php


use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseMigration;

class m_021PrestasiTeamRelation implements BaseMigration
{
    public function up(): array
    {
        return Schema::alterTable("prestasi_team", function (Blueprint $table) {
            $table->alterAddForeignKey("nim", "student", "nim", "fk_nim_prestasi_team");
            $table->alterAddForeignKey("prestasi_id", "prestasi", "id", "fk_prestasi_id_prestasi_team");
            $table->alterAddForeignKey("supervisor_id", "lecturer", "nidn", "fk_supervisor_nidn_prestasi_team");
        });
    }

    public function down(): array
    {
        return [];
    }
}