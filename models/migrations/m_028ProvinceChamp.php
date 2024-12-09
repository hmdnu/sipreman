<?php

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseMigration;
class m_028ProvinceChamp implements BaseMigration
{
    public function up(): array
    {
        return Schema::alterTable("province_champ", function (Blueprint $table) {
            $table->alterAddForeignKey("nim", "student", "nim", "fk_nim_province_champ");
        });
    }

    public function down(): array
    {
        return [];
    }


}