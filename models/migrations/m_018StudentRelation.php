<?php

use app\cores\dbal\ddl\Alteration;
use app\models\BaseMigration;
use app\models\Migration;

class m_018StudentRelation extends BaseMigration implements Migration
{
    public function up(): bool
    {
        return $this->construct->alter("student", function (Alteration $table) {
            $table
                ->addForeignKey("nim", "fk_nim_student")
                ->reference("user", "no_induk");

            $table
                ->addForeignKey("study_program_id", "fk_study_program_student")
                ->reference("study_program", "id");

            $table
                ->addForeignKey("major_id", "fk_major_student")
                ->reference("major", "id");
        })->execute();
    }

    public function down(): bool
    {
        return true;
    }
}
