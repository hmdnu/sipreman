<?php

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\Migration;

class m_010PrestasiTeamMigration implements Migration
{
    public function up(): array
    {

        return Schema::createTableIfNotExist("prestasi_team", function (Blueprint $table) {
            $table->string("id");
            $table->string("nim");
            $table->string("name");
            $table->string("role");
            $table->string("supervisor_id");
            $table->string("prestasi_id");

            $table->primary("id");
        });
    }

    public function down(): array
    {
        return Schema::dropTableIfExist("prestasi_team");
    }
}