<?php

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseMigration;

class m_008PrestasiMigration implements BaseMigration
{
    public function up(): array
    {
        return Schema::createTableIfNotExist("prestasi", function (Blueprint $table) {
            $table->string("id");
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
            $table->tinyInt("is_validate");

            $table->primary("id");
            $table->unique("attachment_id");
            $table->unique("supervisor_id");
        });
    }

    public function down(): array
    {
        return Schema::dropTableIfExist("prestasi");
    }
}
