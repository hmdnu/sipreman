<?php

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\Migration;

class m_025StudyProgramRelation implements Migration
{
    public function up(): array
    {
        return Schema::alterTable("study_program", function (Blueprint $table) {
            $table->alterAddForeignKey("major_id", "major", "id", "fk_major_id_study_program");
        });
    }

    public function down(): array
    {
        return [];
    }


}