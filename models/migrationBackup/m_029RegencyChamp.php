<?php

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\Migration;

class m_029RegencyChamp implements Migration
{

    public function up(): array
    {
        return Schema::alterTable("regency_champ", function (Blueprint $table) {
            $table->alterAddForeignKey("nim", "student", "nim", "fk_nim_regency_champ");
        });
    }

    public function down(): array
    {
        return [];
    }
}