<?php

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\Migration;

class m_011ProvinceChampMigration implements Migration
{
    public function up(): array
    {
        return Schema::createTableIfNotExist("province_champ", function (Blueprint $table) {
            $table->string("id");
            $table->string("nim");

            $table->primary("id");
        });
    }

    public function down(): array
    {
        return Schema::dropTableIfExist("province_champ");
    }
}
