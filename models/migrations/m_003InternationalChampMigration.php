<?php


namespace app\models\migrationBackup;

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\Migration;

class m_003InternationalChampMigration implements Migration
{
    public function up(): array
    {
        return Schema::createTableIfNotExist("international_champ", function (Blueprint $table) {
            $table->string("id");
            $table->string("nim");

            $table->primary("id");
            $table->unique("nim");
        });
    }

    public function down(): array
    {
        return Schema::dropTableIfExist("international_champ");
    }

}