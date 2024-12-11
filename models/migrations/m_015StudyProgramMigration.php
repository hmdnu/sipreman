<?php


namespace app\models\migrationBackup;

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\Migration;

class m_015StudyProgramMigration implements Migration
{
    public function up(): array
    {
        return Schema::createTableIfNotExist("study_program", function (Blueprint $table) {
            $table->string("id");
            $table->string("study_program_name");
            $table->string("major_id");
            $table->int("total_victory_study_program");

            $table->primary("id");
        });
    }

    public function down(): array
    {
        return Schema::dropTableIfExist("study_program");
    }
}
