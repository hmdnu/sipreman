<?php

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseMigration;

class m_016UserMigration implements BaseMigration
{
    public function up(): array
    {
        return Schema::createTableIfNotExist("user", function (Blueprint $table) {
            $table->string("no_induk");
            $table->string("role");
            $table->string("password");

            $table->primary("no_induk");
        });
    }

    public function down(): array
    {
        return Schema::dropTableIfExist("user");
    }
}