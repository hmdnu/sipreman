<?php


use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseMigration;

class m_021PrestasiTeamRelation implements BaseMigration
{
    public function up(): array
    {
        return Schema::alterTable("prestasi_team", function (Blueprint $table) {
            $table->alterAddForeignKey("nim", "student", "nim");
            $table->alterAddForeignKey("prestasi_id", "prestasi", "id");
            $table->alterAddForeignKey("supervisor_id", "lecturer", "nidn");

        });
    }

    public function down(): array
    {
        return [];
    }
}