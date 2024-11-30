<?php

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseMigration;


class m_017AdminRelation implements BaseMigration
{
    public function up(): array
    {
        return Schema::alterTable("admin", function (Blueprint $table) {
            $table->alterAddForeignKey("nip", "user", "no_induk");
        });
    }

    public function down(): array
    {
        return [];
    }
}