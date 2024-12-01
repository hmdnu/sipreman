<?php

use app\cores\Blueprint;
use app\models\BaseMigration;
class m_028ProvinceChamp implements BaseMigration
{
    public function up(): array
    {
        return \app\cores\Schema::alterTable("province_champ", function (Blueprint $table) {
            $table->alterAddForeignKey("nim", "student", "nim");
        });
    }

    public function down(): array
    {
        return [];
    }


}