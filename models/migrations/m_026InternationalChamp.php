<?php

namespace app\models\migrationBackup;

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\Migration;

class m_026InternationalChamp implements Migration
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