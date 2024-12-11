<?php

namespace app\models\migrationBackup;

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\Migration;

class m_022AttachmentRelation implements Migration
{
    public function up(): array
    {
        return Schema::alterTable("attachment", function (Blueprint $table) {
            $table->alterAddForeignKey("loa_id", "loa", "id", "fk_loa_id_attachment");
        });
    }

    public function down(): array
    {
        return [];
    }
}