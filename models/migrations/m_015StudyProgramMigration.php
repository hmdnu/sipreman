<?php

use app\cores\dbal\ddl\Column;
use app\models\BaseMigration;
use app\models\Migration;

class m_015StudyProgramMigration extends BaseMigration implements Migration
{
    public function up(): bool
    {
        return $this->construct->createTable("study_program", function (Column $table) {
            $table->string("id")->primary();
            $table->string("study_program_name");
            $table->string("major_id");
            $table->int("total_victory_study_program");
        })->execute();
    }

    public function down(): bool
    {
       return $this->construct->dropTable("study_program")->execute();
    }
}
