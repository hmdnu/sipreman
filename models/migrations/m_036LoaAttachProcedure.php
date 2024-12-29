<?php

use app\models\BaseMigration;
use app\models\Migration;

class m_036LoaAttachProcedure extends BaseMigration implements Migration
{

    public function up(): bool
    {
        return $this->construct->procedure("insert_loa_attachment")
            ->as(
                $this->construct
                    ->insert("loa")
                    ->values([
                        "id" => "@loa_id",
                        "date" => "@date",
                        "loa_number" => "@loa_number",
                        "loa_pdf_path" => "@loa_pdf_path"
                    ])->getSql(),
                $this->construct
                    ->insert("attachment")
                    ->values([
                        "id" => "@attachment_id",
                        "loa_id" => "@attachment_loa_id",
                        "certificate_path" => "@certificate_path",
                        "documentation_photo_path" => "@docs_photo_path",
                        "poster_path" => "@poster_path",
                        "caption" => "@caption"
                    ])->getSql()
            )
            ->addParam("loa_id", "nvarchar(255)")
            ->addParam("date", "date")
            ->addParam("loa_number", "nvarchar(255)")
            ->addParam("loa_pdf_path", "nvarchar(255)")
            ->addParam("attachment_id", "nvarchar(255)")
            ->addParam("attachment_loa_id", "nvarchar(255)")
            ->addParam("certificate_path", "nvarchar(255)")
            ->addParam("docs_photo_path", "nvarchar(255)")
            ->addParam("poster_path", "nvarchar(255)")
            ->addParam("caption", "nvarchar(255)")
            ->execute();
    }
    public function down(): bool
    {
        return $this->construct->procedure("insert_loa_attachment")->drop()->execute();
    }
}
