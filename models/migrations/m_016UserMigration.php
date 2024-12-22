<?php


use app\cores\dbal\ddl\Column;
use app\models\BaseMigration;
use app\models\Migration;

class m_016UserMigration extends BaseMigration implements Migration
{
    public function up(): bool
    {
        return $this->construct->create("user", function (Column $table) {
            $table->string("no_induk")->primary();
            $table->string("role");
            $table->string("password");
        })->execute();
    }

    public function down(): bool
    {
        return $this->construct->drop("user")->execute();
    }
}