<?php

namespace app\models\migrationBackup;

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\Migration;

class m_007NationalChampMigration implements Migration
{
    public function up(): array
    {
        return Schema::createTableIfNotExist("national_champ", function (Blueprint $table) {
            $table->string("id");
            $table->string("nim");

            $table->primary("id");
        });
    }

    public function down(): array
    {
        return Schema::dropTableIfExist("national_champ");
    }
}