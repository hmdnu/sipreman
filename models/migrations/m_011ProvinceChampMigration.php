<?php

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseMigration;

class m_011ProvinceChampMigration implements BaseMigration
{
    public function up(): array
    {
        return Schema::createTableIfNotExist("province_champ", function (Blueprint $table) {
            $table->string("id");
            $table->string("nim");

            $table->primary("id");
            $table->unique("nim");
        });
    }

    public function down(): array
    {
        return Schema::dropTableIfExist("province_champ");
    }
}
