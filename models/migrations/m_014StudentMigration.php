<?php


namespace app\models\migrationBackup;

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\Migration;

class m_014StudentMigration implements Migration
{
    public function up(): array
    {
        return Schema::createTableIfNotExist("student", function (Blueprint $table) {
            $table->string("nim");
            $table->string("name");
            $table->string("study_program_id");
            $table->string("major_id");

            $table->primary("nim");
        });
    }

    public function down(): array
    {
        return Schema::dropTableIfExist("student");
    }
}