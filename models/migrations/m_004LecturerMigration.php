<?php

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseMigration;

class m_004LecturerMigration implements BaseMigration
{
    public function up(): array
    {
        return Schema::createTableIfNotExist("lecturer", function (Blueprint $table) {
            $table->string("id");
            $table->string("nidn");
            $table->string("name");

            $table->primary("id");
            $table->unique("nidn");
        });
    }

    public function down(): array
    {
        return Schema::dropTableIfExist("lecturer");
    }
}