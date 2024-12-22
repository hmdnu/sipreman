<?php

use app\cores\dbal\ddl\Column;
use app\models\BaseMigration;
use app\models\Migration;

class m_025StudyProgramRelation extends BaseMigration implements Migration
{
    public function up(): bool
    {
        return $this->construct->alterTable("study_program", function (Column $table) {
            $table
                ->addForeignKey("major_id", "fk_major_id_study_program")
                ->reference("major", "id")
                ->cascade();
        })->execute();
    }

    public function down(): bool
    {
        return true;
    }
}
