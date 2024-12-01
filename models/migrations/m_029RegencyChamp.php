<?php

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseMigration;

class m_029RegencyChamp implements BaseMigration
{

    public function up(): array
    {
        return Schema::alterTable("regency_champ", function (Blueprint $table) {
            $table->alterAddForeignKey("nim", "student", "nim");
        });
    }

    public function down(): array
    {
        return [];
    }
}