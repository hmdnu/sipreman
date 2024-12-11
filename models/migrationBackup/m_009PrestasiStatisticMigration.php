<?php;

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\Migration;

class m_009PrestasiStatisticMigration implements Migration
{
    public function up(): array
    {
        return Schema::createTableIfNotExist("prestasi_statistic", function (Blueprint $table) {
            $table->string("id");
            $table->string("major_id");
            $table->string("study_program_id");
            $table->string("total_victory_all");
            $table->int("year");

            $table->primary("id");
        });
    }

    public function down(): array
    {
        return Schema::dropTableIfExist("prestasi_statistic");
    }
}
