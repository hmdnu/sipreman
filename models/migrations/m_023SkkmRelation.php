<?php

use app\cores\dbal\ddl\Alteration;
use app\models\BaseMigration;
use app\models\Migration;

class m_023SkkmRelation extends BaseMigration implements Migration
{
    public function up(): bool
    {
        return $this->construct->alter("skkm", function (Alteration $table) {
            $table
                ->addForeignKey("prestasi_id", "fk_prestasi_id_skkm")
                ->reference("prestasi", "id");

            $table
                ->addForeignKey("nim", "fk_nim_skkm")
                ->reference("student", "nim");
        })->execute();
    }

    public function down(): bool
    {
        return true;
    }
}
