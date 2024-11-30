<?php

use app\models\BaseMigration;
use app\cores\Schema;
use app\cores\Blueprint;

class m_001AdminMigration implements BaseMigration
{
    public function up(): array
    {
        return Schema::createTableIfNotExist("admin", function (Blueprint $table) {
            $table->string("id");
            $table->string("nip");
            $table->string("name");

            $table->primary("id");
            $table->unique("nip");
        });
    }

    public function down(): array
    {
        return Schema::dropTableIfExist("Admin");
    }
}