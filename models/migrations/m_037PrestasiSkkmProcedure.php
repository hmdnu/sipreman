<?php

use app\models\BaseMigration;
use app\models\Migration;

class m_037PrestasiSkkmProcedure extends BaseMigration implements Migration
{

    public function up(): bool
    {

        return $this->construct->procedure("insert_prestasi_team_skkm")
            ->as(
                $this->construct
                    ->insert("prestasi_team")
                    ->values([
                        "id" => "@pt_id",
                        "nim" => "@pt_nim",
                        "name" => "@name",
                        "role" => "@role",
                        "supervisor_id" => "@pt_supervisor_id",
                        "prestasi_id" => "@pt_prestasi_id",
                    ])->getSql(),

                $this->construct
                    ->insert("skkm")
                    ->values([
                        "id" => "@skkm_id",
                        "nim" => "@skkm_nim",
                        "prestasi_id" => "@skkm_prestasi_id",
                        "certificate_number" => "@certificate_number",
                        "level" => "@level",
                        "certificate_path" => "@certificate_path",
                        "point" => "@point"
                    ])
                    ->getSql()
            )
            ->addParam("pt_id", "nvarchar(255)")
            ->addParam("pt_nim", "nvarchar(255)")
            ->addParam("name", "nvarchar(255)")
            ->addParam("role", "nvarchar(255)")
            ->addParam("pt_supervisor_id", "nvarchar(255)")
            ->addParam("pt_prestasi_id", "nvarchar(255)")
            ->addParam("skkm_id", "nvarchar(255)")
            ->addParam("skkm_nim", "nvarchar(255)")
            ->addParam("skkm_prestasi_id", "nvarchar(255)")
            ->addParam("certificate_number", "nvarchar(255)")
            ->addParam("level", "nvarchar(255)")
            ->addParam("certificate_path", "nvarchar(255)")
            ->addParam("point", "decimal")
            ->execute();
    }

    public function down(): bool
    {
        return $this->construct->procedure("insert_prestasi_skkm")->drop()->execute();
    }
}
