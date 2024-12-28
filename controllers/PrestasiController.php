<?php

namespace app\controllers;

use app\constant\ValidationState;
use app\cores\Database;
use app\cores\dbal\Construct;
use app\cores\Request;
use app\cores\Response;
use app\helpers\CompetitionRequest;
use app\helpers\UUID;
use app\models\database\championLevel\InternationalChamp;
use app\models\database\championLevel\NationalChamp;
use app\models\database\championLevel\ProvinceChamp;
use app\models\database\championLevel\RegencyChamp;
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

        // create procedure for handling insert
        Prestasi::createLoaAndAttachmentProcedure();
        Prestasi::createPrestasiTeamSkkmProcedure();
        // invoke triggers
        $this->invokeTriggers();
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
                    "competition_level" => strtolower($competitionDetails["competition_level"]),
                    "place" => $competitionDetails["place"],
                    "date_start_competition" => $competitionDetails["date_start_competition"],
                    "date_end_competition" => $competitionDetails["date_end_competition"],
                    "competition_source" => $competitionDetails["competition_source"],
                    "total_college_attended" => $competitionDetails["total_college_attended"],
                    "total_participant" => $competitionDetails["total_participant"],
                    "validation_state" => ValidationState::WAITING,
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

    private function invokeTriggers(): void
    {
        InternationalChamp::createInsertTrigger();
        NationalChamp::createInsertTrigger();
        ProvinceChamp::createInsertTrigger();
        RegencyChamp::createInsertTrigger();
    }
}