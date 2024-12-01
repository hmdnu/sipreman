<?php

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseMigration;

class m_023SkkmRelation implements BaseMigration
{
    public function up(): array
    {
        return Schema::alterTable("skkm", function (Blueprint $table) {
            $table->alterAddForeignKey("prestasi_id", "prestasi", "id");
            $table->alterAddForeignKey("nim", "student", "nim");

        });
    }

    public function down(): array
    {
        return [];
    }


}