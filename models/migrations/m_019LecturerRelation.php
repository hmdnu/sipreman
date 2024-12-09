<?php

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseMigration;

class m_019LecturerRelation implements BaseMigration
{
    public function up(): array
    {
        return Schema::alterTable("lecturer", function (Blueprint $table) {
            $table->alterAddForeignKey("nidn", "user", "no_induk", "fk_nidn_lecturer", "NO ACTION");
        });
    }

    public function down(): array
    {
        return Schema::alterTable("lecturer", function (Blueprint $table) {
            $table->alterDropConstraint("nidn");
        });
    }
}