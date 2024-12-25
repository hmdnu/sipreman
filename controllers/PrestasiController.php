<?php

namespace app\controllers;

use app\cores\Database;
use app\cores\dbal\Construct;
use app\cores\Request;
use app\cores\Response;
use app\helpers\CompetitionRequest;
use app\helpers\UUID;
use Exception;
use app\models\database\prestasiCore\Prestasi;

class PrestasiController extends BaseController
{
    private string $baseUploadDir = "./public/uploads";
    private Construct $construct;

    public function __construct()
    {
        $this->construct = new Construct();
        parent::__construct();
    }

    public function postPrestasi(Request $req, Response $res): void
    {
        $body = $req->body();
        $file = $req->file();

        $competitionRequest = new CompetitionRequest($body);
        $studentDetails = $competitionRequest->getStudentDetails();
        $competitionDetails = $competitionRequest->getCompetitionDetails();
        $loaDetails = $competitionRequest->getLoaDetails();

        $prestasiId = UUID::generate();
        $attachmentIds = UUID::generate();
        $loaId = UUID::generate();

        try {
            // create procedure for handling insert
            $this->createLoaAndAttachmentProcedure();
            $this->createPrestasiTeamSkkmProcedure();

            $loaFile = $this->handleFileUpload($file["loa-file"]);
            $certificateFile = $this->handleFileUpload($file["certificate-file"]);
            $photoFile = $this->handleFileUpload($file["photo-file"]);
            $flyerFile = $this->handleFileUpload($file["flyer-file"]);

            $db = Database::getConnection();
            $db->beginTransaction();

            $this->construct->call("insert_loa_attachment", [
                "loa_id" => $loaId,
                "date" => $loaDetails["loa_date"],
                "loa_number" => $loaDetails["loa_number"],
                "loa_pdf_path" => $loaFile,

                "attachment_id" => $attachmentIds,
                "attachment_loa_id" => $loaId,
                "certificate_path" => $certificateFile,
                "docs_photo_path" => $photoFile,
                "poster_path" => $flyerFile,
                "caption" => "ini itu caption bro"
            ])->execute();

            Prestasi::insert(
                [
                    "id" => $prestasiId,
                    "competition_name" => $competitionDetails["competition_name"],
                    "category_name" => $competitionDetails["category_name"],
                    "competition_level" => $competitionDetails["competition_level"],
                    "place" => $competitionDetails["place"],
                    "date_start_competition" => $competitionDetails["date_start_competition"],
                    "date_end_competition" => $competitionDetails["date_end_competition"],
                    "competition_source" => $competitionDetails["competition_source"],
                    "total_college_attended" => $competitionDetails["total_college_attended"],
                    "total_participant" => $competitionDetails["total_participant"],
                    "is_validate" => 0,
                    "attachment_id" => $attachmentIds,
                    "supervisor_id" => $competitionDetails["supervisor_id"],
                ]
            );


            for ($i = 0; $i < count($studentDetails["nim"]); $i++) {
                $this->construct->call("insert_prestasi_team_skkm", [
                    "pt_id" => UUID::generate(),
                    "pt_nim" => $studentDetails["nim"][$i],
                    "name" => $studentDetails["names"][$i],
                    "role" => $studentDetails["roles"][$i],
                    "pt_supervisor_id" => $competitionDetails["supervisor_id"],
                    "pt_prestasi_id" => $prestasiId,
                    "skkm_id" => UUID::generate(),
                    "skkm_nim" => $studentDetails["nim"][$i],
                    "skkm_prestasi_id" => $prestasiId,
                    "certificate_number" => null,
                    "level" => null,
                    "certificate_path" => null,
                    "point" => 0,
                ])->execute();
            }

            $db->commit();
            echo "sukses";
        } catch (\PDOException|Exception $e) {
            var_dump($e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    private function handleFileUpload(array $file): string
    {
        $fileName = $file["name"];
        $tmpName = $file["tmp_name"];
        $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        $isOk = false;
        $filePath = "";

        if ($fileType === "pdf") {
            $res = $this->uploadDocs($tmpName, $fileName);

            $isOk = $res["isOk"];
            $filePath = $res["filePath"];
        } else if ($fileType === "png" || $fileType === "jpg" || $fileType === "jpeg") {
            $res = $this->uploadImg($tmpName, $fileName);
            $isOk = $res["isOk"];
            $filePath = $res["filePath"];
        }

        if (!$isOk) {
            throw new Exception("Cant upload file");
        }

        return $filePath;
    }

    private function uploadDocs(string $tmpName, string $fileName): array
    {
        $dir = $this->baseUploadDir . "/documents";
        $temp = explode(".", $fileName);
        $newfilename = $dir . '/' . date("Y-m-d_H-i-s") . "_{$temp[0]}" . '.' . $temp[1];

        return [
            "isOk" => move_uploaded_file($tmpName, $newfilename),
            "filePath" => $newfilename
        ];
    }

    private function uploadImg(string $tmpName, string $fileName): array
    {
        $dir = $this->baseUploadDir . "/img";
        $temp = explode(".", $fileName);
        $newfilename = $dir . '/' . date("Y-m-d_H-i-s") . "$fileName" . '.' . end($temp);

        return [
            "isOk" => move_uploaded_file($tmpName, $newfilename),
            "filePath" => $newfilename
        ];
    }

    private function createLoaAndAttachmentProcedure(): void
    {
        $this->construct->procedure("insert_loa_attachment")
            ->as(
                $this->construct
                    ->insert("loa")
                    ->values([
                        "id" => "@loa_id",
                        "date" => "@date",
                        "loa_number" => "@loa_number",
                        "loa_pdf_path" => "@loa_pdf_path"
                    ])->getSql()
                ,
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

    private function createPrestasiTeamSkkmProcedure(): void
    {
        $this->construct->procedure("insert_prestasi_team_skkm")
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
}
