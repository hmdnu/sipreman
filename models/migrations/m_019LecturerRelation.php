<?php

use app\cores\dbal\ddl\Column;
use app\models\BaseMigration;
use app\models\Migration;

class m_019LecturerRelation extends BaseMigration implements Migration
{
    public function up(): bool
    {
        return $this->construct->alterTable("lecturer", function (Column $table) {
            $table
                ->addForeignKey("nidn", "fk_nidn_lecturer")
                ->reference("user", "no_induk")
                ->cascade();
        })->execute();
    }

    public function down(): bool
    {
        return true;
    }
}
