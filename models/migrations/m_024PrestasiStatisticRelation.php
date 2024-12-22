<?php

use app\cores\dbal\ddl\Column;
use app\models\BaseMigration;
use app\models\Migration;

class m_024PrestasiStatisticRelation extends BaseMigration implements Migration
{
    public function up(): bool
    {
        return $this->construct->alterTable("prestasi_statistic", function (Column $table) {
            $table
                ->addForeignKey("study_program_id", "fk_study_program_id_prestasi_statistic")
                ->reference("study_program", "id")
                ->cascade();
            $table
                ->addForeignKey("major_id", "fk_study_major_id_prestasi_statistic")
                ->reference("major", "id")
                ->cascade();

        })->execute();
    }

    public function down(): bool
    {
        return true;
    }
}
