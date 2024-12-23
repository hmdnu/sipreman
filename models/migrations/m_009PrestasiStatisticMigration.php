<?php

use app\cores\dbal\ddl\Column;
use app\models\BaseMigration;
use app\models\Migration;

class m_009PrestasiStatisticMigration extends BaseMigration implements Migration
{
    public function up(): bool
    {
        return $this->construct->create("prestasi_statistic", function (Column $table) {
            $table->string("id")->primary();
            $table->string("major_id");
            $table->string("study_program_id");
            $table->string("total_victory_all");
            $table->int("year");
        })->execute();
    }

    public function down(): bool
    {
        return $this->construct->drop("prestasi_statistic")->execute();
    }
}
