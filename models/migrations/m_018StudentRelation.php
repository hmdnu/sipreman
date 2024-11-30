<?php

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseMigration;

class m_018StudentRelation implements BaseMigration
{
    public function up(): array
    {
        return Schema::alterTable("student", function (Blueprint $table) {
            $table->alterAddForeignKey("nim", "user", "no_induk");
            $table->alterAddForeignKey("prestasi_id", "prestasi", "id");
            $table->alterAddForeignKey("study_program_id", "study_program", "id");
            $table->alterAddForeignKey("major_id", "major", "id");
        });
    }

    public function down(): array
    {
        return [];
    }

}