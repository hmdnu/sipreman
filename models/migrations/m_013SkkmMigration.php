<?php


use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseMigration;

class m_013SkkmMigration implements BaseMigration
{
    public function up(): array
    {
        return Schema::createTableIfNotExist("skkm", function (Blueprint $table) {
            $table->string("id");
            $table->string("nim");
            $table->string("prestasi_id");
            $table->string("certificate_number");
            $table->string("level"); // level of championship
            $table->string("certification_path");
            $table->decimal("points");

            $table->primary("id");
            $table->unique("nim");
            $table->unique("certificate_number");
            $table->unique("prestasi_id");

        });
    }

    public function down(): array
    {
        return Schema::dropTableIfExist("skkm");
    }
}
