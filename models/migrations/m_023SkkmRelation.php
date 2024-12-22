<?php

use app\cores\dbal\ddl\Column;
use app\models\BaseMigration;
use app\models\Migration;

class m_023SkkmRelation extends BaseMigration implements Migration
{
    public function up(): bool
    {
        return $this->construct->alterTable("skkm", function (Column $table) {
            $table
                ->addForeignKey("prestasi_id", "fk_prestasi_id_skkm")
                ->reference("prestasi", "id")
                ->cascade();

            $table
                ->addForeignKey("nim", "fk_nim_skkm")
                ->reference("student", "nim")
                ->cascade();
        })->execute();
    }

    public function down(): bool
    {
        return true;
    }
}
