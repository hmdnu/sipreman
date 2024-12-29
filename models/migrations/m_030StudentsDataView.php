<?php

use app\models\BaseMigration;
use app\models\Migration;

class m_030StudentsDataView extends BaseMigration implements Migration
{

    public function up(): bool
    {
        return $this->construct->view("student_data_view")->as(
            $this->construct->select(
                "pt.nim",
                "pt.name",
                "p.competition_name",
                "m.major_name",
                "sp.study_program_name",
                "p.validation_state",
                "pt.role",
                "pt.prestasi_id"
            )->from("prestasi_team", "pt")
                ->innerJoin("prestasi", "p")->on("pt.prestasi_id", "p.id")
                ->innerJoin("student", "s")->on("pt.nim", "s.nim")
                ->innerJoin("study_program", "sp")->on("s.study_program_id", "sp.id")
                ->innerJoin("major", "m")->on("s.major_id", "m.id")
                ->getSql()
        )->execute();
    }
    public function down(): bool
    {
        return $this->construct->view("student_data_view")->drop()->execute();
    }
}