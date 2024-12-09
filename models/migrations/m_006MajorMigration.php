<?php

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseMigration;

class m_006MajorMigration implements BaseMigration
{
    public function up(): array
    {
        return Schema::createTableIfNotExist("major", function (Blueprint $table) {
            $table->string("id");
            $table->string("major_name");
            $table->int("total_victory_major");

            $table->primary("id");
        });
    }

    public function down(): array
    {
        return Schema::dropTableIfExist("major");
    }
}