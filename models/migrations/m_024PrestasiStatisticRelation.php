<?php

use app\cores\dbal\ddl\Alteration;
use app\models\BaseMigration;
use app\models\Migration;

class m_024PrestasiStatisticRelation extends BaseMigration implements Migration
{
    public function up(): bool
    {
        return $this->construct->alter("prestasi_statistic", function (Alteration $table) {
            $table
                ->addForeignKey("study_program_id", "fk_study_program_id_prestasi_statistic")
                ->reference("study_program", "id");

            $table
                ->addForeignKey("major_id", "fk_major_id_prestasi_statistic")
                ->reference("major", "id");
        })->execute();
    }

    public function down(): bool
    {
        return true;
    }
}
