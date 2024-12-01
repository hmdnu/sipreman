<?php


use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseMigration;

class m_015StudyProgramMigration implements BaseMigration
{
    public function up(): array
    {
        return Schema::createTableIfNotExist("study_program", function (Blueprint $table) {
            $table->string("id");
            $table->string("study_program_name");
            $table->string("major_id");
            $table->int("total_victory_study_program");

            $table->primary("id");
            $table->unique("major_id");
        });
    }

    public function down(): array
    {
        return Schema::dropTableIfExist("study_program");
    }
}
