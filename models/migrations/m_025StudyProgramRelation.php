<?php

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseMigration;

class m_025StudyProgramRelation implements BaseMigration
{
    public function up(): array
    {
        return Schema::alterTable("study_program", function (Blueprint $table) {
            $table->alterAddForeignKey("major_id", "major", "id");
        });
    }

    public function down(): array
    {
        return [];
    }


}