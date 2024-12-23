<?php

use app\cores\dbal\ddl\Alteration;
use app\models\BaseMigration;
use app\models\Migration;

class m_025StudyProgramRelation extends BaseMigration implements Migration
{
    public function up(): bool
    {
        return $this->construct->alter("study_program", function (Alteration $table) {
            $table
                ->addForeignKey("major_id", "fk_major_id_study_program")
                ->reference("major", "id");
        })->execute();
    }

    public function down(): bool
    {
        return true;
    }
}
