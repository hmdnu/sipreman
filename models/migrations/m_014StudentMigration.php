<?php


use app\cores\dbal\ddl\Column;
use app\models\BaseMigration;
use app\models\Migration;

class m_014StudentMigration extends BaseMigration  implements Migration
{
    public function up(): bool
    {
        return $this->construct->createTable("student", function (Column $table) {
            $table->string("nim")->primary();
            $table->string("name");
            $table->string("study_program_id");
            $table->string("major_id");
        })->execute();
    }

    public function down(): bool
    {
        return $this->construct->dropTable("student")->execute();
    }
}
