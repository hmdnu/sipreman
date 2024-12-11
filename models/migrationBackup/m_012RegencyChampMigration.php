<?php

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\Migration;

class m_012RegencyChampMigration implements Migration
{
    public function up(): array
    {
        return Schema::createTableIfNotExist("regency_champ", function (Blueprint $table) {
            $table->string("id");
            $table->string("nim");

            $table->primary("id");
        });
    }

    public function down(): array
    {
        return Schema::dropTableIfExist("regency_champ");
    }
}
