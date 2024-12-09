<?php

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseMigration;

class m_018StudentRelation implements BaseMigration
{
    public function up(): array
    {
        return Schema::alterTable("student", function (Blueprint $table) {
            $table->alterAddForeignKey("nim", "user", "no_induk", "fk_nim_student");
            $table->alterAddForeignKey("study_program_id", "study_program", "id", "fk_study_program_student");
            $table->alterAddForeignKey("major_id", "major", "id", "fk_major_student");
        });
    }

    public function down(): array
    {
        return Schema::alterTable("student", function (Blueprint $table) {
            $table->alterDropConstraint("FK_nim");
        });
    }

}