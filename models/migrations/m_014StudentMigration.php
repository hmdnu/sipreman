<?php


use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseMigration;
use app\models\users\Student;

class m_014StudentMigration implements BaseMigration
{
    public function up(): array
    {
        return Schema::createTableIfNotExist("student", function (Blueprint $table) {
            $table->string("id");
            $table->string("nim");
            $table->string("name");
            $table->string("prestasi_id");
            $table->string("study_program_id");
            $table->string("major_id");

            $table->primary("id");
            $table->unique("nim");
            $table->unique("prestasi_id");
            $table->unique("major_id");
        });
    }

    public function down(): array
    {
        return Schema::dropTableIfExist("student");
    }
}