<?php

namespace app\models\migrationBackup;

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\Migration;

class m_004LecturerMigration implements Migration
{
    public function up(): array
    {
        return Schema::createTableIfNotExist("lecturer", function (Blueprint $table) {
            $table->string("nidn");
            $table->string("name");

            $table->primary("nidn");
        });
    }

    public function down(): array
    {
        return Schema::dropTableIfExist("lecturer");
    }
}