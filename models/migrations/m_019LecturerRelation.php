<?php

namespace app\models\migrationBackup;

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseMigration;
use app\models\users\Lecturer;
use app\models\users\User;

class m_019LecturerRelation implements BaseMigration
{
    public function up(): array
    {
        return Schema::alterTable("lecturer", function (Blueprint $table) {
            $table->alterAddForeignKey("nidn", "user", "no_induk");
        });
    }

    public function down(): array
    {
        return [];
    }
}