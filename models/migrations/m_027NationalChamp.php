<?php

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseMigration;

class m_027NationalChamp implements BaseMigration
{
    public function up(): array
    {
        return Schema::alterTable("national_champ", function (Blueprint $table) {
            $table->alterAddForeignKey("nim", "student", "nim", "fk_nim_national_champ");
        });
    }

    public function down(): array
    {
        return [];
    }


}