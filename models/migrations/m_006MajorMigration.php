<?php

namespace app\models\migrationBackup;

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\Migration;

class m_006MajorMigration implements Migration
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