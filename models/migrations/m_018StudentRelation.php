<?php

use app\cores\dbal\Column;
use app\models\BaseMigration;
use app\models\Migration;

class m_018StudentRelation extends BaseMigration implements Migration
{
    public function up(): bool
    {
        return $this->construct->alterTable("student", function (Column $table) {
            $table
                ->addForeignKey("nim", "fk_nim_student")
                ->reference("user", "no_induk")
                ->cascade();

            $table
                ->addForeignKey("study_program_id", "fk_study_program_student")
                ->reference("study_program", "id")
                ->cascade();

            $table
                ->addForeignKey("major_id", "fk_major_student")
                ->reference("major", "id")
                ->cascade();
        })->execute();
    }

    public function down(): bool
    {
        return true;
    }
}
