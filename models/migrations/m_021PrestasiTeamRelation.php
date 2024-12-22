<?php

use app\cores\dbal\ddl\Column;
use app\models\BaseMigration;
use app\models\Migration;

class m_021PrestasiTeamRelation extends BaseMigration implements Migration
{
    public function up(): bool
    {
        return $this->construct->alterTable('prestasi_team', function (Column $table) {
            $table
                ->addForeignKey("nim", "fk_nim_prestasi_team")
                ->reference("student", "nim")
                ->cascade();
            $table
                ->addForeignKey("prestasi_id", "fk_prestasi_id_prestasi_team")
                ->reference("student", "id")
                ->cascade();
            $table
                ->addForeignKey("supervisor_id", "fk_supervisor_nidn_prestasi_team")
                ->reference("nidn", "lecturer")
                ->cascade();
        })->execute();
    }

    public function down(): bool
    {
        return true;
    }
}
