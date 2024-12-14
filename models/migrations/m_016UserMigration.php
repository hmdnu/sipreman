<?php


use app\cores\Blueprint;
use app\cores\dbal\Column;
use app\cores\Schema;
use app\models\BaseMigration;
use app\models\Migration;

class m_016UserMigration extends BaseMigration implements Migration
{
    public function up(): bool
    {
        return $this->construct->createTable("user", function (Column $table) {
            $table->string("no_induk")->primary();
            $table->string("role");
            $table->string("password");
        })->execute();
    }

    public function down(): bool
    {
        return $this->construct->dropTable("user")->execute();
    }
}