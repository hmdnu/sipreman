<?php

use app\models\BaseMigration;
use app\models\Migration;

class m_031PrestasiView extends BaseMigration implements Migration
{

    public function up(): bool
    {
        return $this->construct->view("prestasi_view")->as(
            $this->construct
                ->select(
                    "pt.nim",
                    "p.competition_name",
                    "l.loa_number",
                    "p.competition_level",
                    "pt.role",
                    "sk.point",
                    "p.validation_state"
                )
                ->from("prestasi_team", "pt")
                ->innerJoin("student", "s")->on("pt.nim", "s.nim")
                ->innerJoin("prestasi", "p")->on("pt.prestasi_id", "p.id")
                ->innerJoin("attachment", "a")->on("p.attachment_id", "a.id")
                ->innerJoin("loa", "l")->on("l.id", "a.loa_id")
                ->innerJoin("skkm", "sk")->on("sk.prestasi_id", "p.id")
                ->getSql()
        )->execute();
    }
    public function down(): bool
    {

        return $this->construct->view("prestasi_team")->drop()->execute();
    }
}
