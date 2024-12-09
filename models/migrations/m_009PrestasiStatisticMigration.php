<?php

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseMigration;

class m_009PrestasiStatisticMigration implements BaseMigration
{
    public function up(): array
    {
        return Schema::createTableIfNotExist("prestasi_statistic", function (Blueprint $table) {
            $table->string("id");
            $table->string("major_id");
            $table->string("study_program_id");
            $table->string("total_victory_all");
            $table->int("year");

            $table->primary("id");
            $table->unique("major_id");
            $table->unique("study_program_id");
        });
    }

    public function down(): array
    {
        return Schema::dropTableIfExist("prestasi_statistic");
    }
}
