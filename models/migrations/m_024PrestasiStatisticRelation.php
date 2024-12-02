<?php


use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseMigration;

class m_024PrestasiStatisticRelation implements BaseMigration
{
    public function up():array
    {
        return Schema::alterTable("prestasi_statistic", function (Blueprint $table) {
            $table->alterAddForeignKey("study_program_id", "study_program","id", "fk_study_program_id_prestasi_statistic");
            $table->alterAddForeignKey("major_id", "major","id", "fk_major_id_prestasi_statistic");
        });
    }

    public function down(): array
    {
        return [];
    }

}