<?php

use app\cores\dbal\ddl\Alteration;
use app\models\BaseMigration;
use app\models\Migration;

class m_019LecturerRelation extends BaseMigration implements Migration
{
    public function up(): bool
    {
        return $this->construct->alter("lecturer", function (Alteration $table) {
            $table
                ->addForeignKey("nidn", "fk_nidn_lecturer")
                ->reference("user", "no_induk")
                ->onUpdate("cascade")
                ->onDelete("cascade");
        })->execute();
    }

    public function down(): bool
    {
        return true;
    }
}
