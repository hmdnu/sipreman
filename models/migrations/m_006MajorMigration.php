<?php


use app\cores\Blueprint;
use app\cores\dbal\Column;
use app\cores\Schema;
use app\models\BaseMigration;
use app\models\Migration;

class m_006MajorMigration extends BaseMigration implements Migration
{
    public function up(): bool
    {
        return $this->construct->createTable("major", function (Column $table) {
            $table->string("id")->primary();
            $table->string("major_name");
            $table->int("total_victory_major");
        })->execute();
    }

    public function down(): bool
    {
        return $this->construct->dropTable("major")->execute();
    }
}
