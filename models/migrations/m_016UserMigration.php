<?php

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseMigration;

class m_016UserMigration implements BaseMigration
{
    public function up(): array
    {
        return Schema::createTableIfNotExist("user", function (Blueprint $table) {
            $table->string("id");
            $table->string("no_induk");
            $table->string("password");

            $table->primary("id");
            $table->unique("no_induk");
        });
    }

    public function down(): array
    {
        return Schema::dropTableIfExist("user");
    }
}