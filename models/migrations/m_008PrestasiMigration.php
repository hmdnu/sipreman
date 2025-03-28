<?php

use app\cores\dbal\ddl\Column;
use app\models\BaseMigration;
use app\models\Migration;

class m_008PrestasiMigration extends BaseMigration implements Migration
{
    public function up(): bool
    {
        return $this->construct->create("prestasi", function (Column $table) {
            $table->string("id")->primary();
            $table->string("attachment_id");
            $table->string("competition_name");
            $table->string("category_name");
            $table->string("competition_level");
            $table->string("place");
            $table->date("date_start_competition");
            $table->date("date_end_competition");
            $table->string("competition_source");
            $table->int("total_college_attended");
            $table->int("total_participant");
            $table->string("supervisor_id");
            $table->string("validation_state");
        })->execute();
    }

    public function down(): bool
    {
        return $this->construct->drop("prestasi")->execute();
    }
}
