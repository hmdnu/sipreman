<?php


namespace app\models\migrationBackup;

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\Migration;

class m_013SkkmMigration implements Migration
{
    public function up(): array
    {
        return Schema::createTableIfNotExist("skkm", function (Blueprint $table) {
            $table->string("id");
            $table->string("nim");
            $table->string("prestasi_id");
            $table->string("certificate_number");
            $table->string("level"); // level of championship
            $table->string("certificate_path");
            $table->decimal("point");

            $table->primary("id");
        });
    }

    public function down(): array
    {
        return Schema::dropTableIfExist("skkm");
    }
}
