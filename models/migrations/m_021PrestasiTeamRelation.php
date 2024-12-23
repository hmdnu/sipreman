<?php

use app\cores\dbal\ddl\Alteration;
use app\models\BaseMigration;
use app\models\Migration;

class m_021PrestasiTeamRelation extends BaseMigration implements Migration
{
    public function up(): bool
    {
        return $this->construct->alter('prestasi_team', function (Alteration $table) {
            $table
                ->addForeignKey("nim", "fk_nim_prestasi_team")
                ->reference("student", "nim");
                
            $table
                ->addForeignKey("supervisor_id", "fk_supervisor_nidn_prestasi_team")
                ->reference("lecturer", "nidn");
                    
            $table
                ->addForeignKey("prestasi_id", "fk_prestasi_id_prestasi_team")
                ->reference("prestasi", "id");

        })->execute();
    }

    public function down(): bool
    {
        return true;
    }
}
