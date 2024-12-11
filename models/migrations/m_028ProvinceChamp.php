<?php

namespace app\models\migrationBackup;

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\Migration;

class m_028ProvinceChamp implements Migration
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