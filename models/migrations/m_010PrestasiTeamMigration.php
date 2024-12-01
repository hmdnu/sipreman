<?php

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseMigration;

class m_010PrestasiTeamMigration implements BaseMigration
{
    public function up(): array
    {

        return Schema::createTableIfNotExist("prestasi_team", function (Blueprint $table) {
            $table->string("id");
            $table->tinyInt("is_leader");
            $table->tinyInt("is_member");
            $table->string("supervisor_id");
            $table->string("prestasi_id");

            $table->primary("id");
            $table->unique("prestasi_id");
            $table->unique("supervisor_id");
        });
    }

    public function down(): array
    {
        return Schema::dropTableIfExist("prestasi_team");
    }
}
