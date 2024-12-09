<?php

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseMigration;

class m_026InternationalChamp implements BaseMigration
{
    public function up(): array
    {
        return Schema::alterTable("international_champ", function (Blueprint $table) {
            $table->alterAddForeignKey("nim", "student", "nim", "fk_nim_international_champ");
        });
    }

    public function down(): array
    {
        return [];
    }


}