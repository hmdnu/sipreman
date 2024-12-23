<?php

namespace app\controllers;

use app\cores\Database;
use app\cores\Request;
use app\cores\Response;
use app\helpers\CompetitionRequest;
use app\helpers\UUID;
use app\models\database\prestasiCore\Attachment;
use app\models\database\prestasiCore\Loa;
use app\models\database\prestasiCore\PrestasiTeam;
use Exception;
use app\models\database\prestasiCore\Prestasi;

class PrestasiController extends BaseController
{
    private string $baseUploadDir = "./public/uploads";

    public function __construct()
    {
        parent::__construct();
    }

    public function postPrestasi(Request $req, Response $res): void
    {
        $body = $req->body();
        $file = $req->file();

        try {
            $competitionRequest = new CompetitionRequest($body);
            $studentDetails = $competitionRequest->getStudentDetails();
            $competitionDetails = $competitionRequest->getCompetitionDetails();
            $loaDetails = $competitionRequest->getLoaDetails();

            $loaFile = $this->handleFileUpload($file["loa-file"]);
            $certificateFile = $this->handleFileUpload($file["certificate-file"]);
            $photoFile = $this->handleFileUpload($file["photo-file"]);
            $flyerFile = $this->handleFileUpload($file["flyer-file"]);

            $prestasiId = UUID::generate();
            $attachmentIds = UUID::generate();
            $loaId = UUID::generate();

            $db = Database::getConnection();
            $db->beginTransaction();

            Loa::insert([
                "id" => $loaId,
                "date" => $loaDetails["loa_date"],
                "loa_number" => $loaDetails["loa_number"],
                "loa_pdf_path" => $loaFile
            ]);

            Attachment::insert([
                "id" => $attachmentIds,
                "loa_id" => $loaId,
                "certificate_path" => $certificateFile,
                "documentation_photo_path" => $photoFile,
                "poster_path" => $flyerFile,
                "caption" => "ini itu caption bro"
            ]);

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
                PrestasiTeam::insert(
                    [
                        "id" => UUID::generate(),
                        "nim" => $studentDetails["nim"][$i],
                        "name" => $studentDetails["name"][$i],
                        "role" => $studentDetails["roles"][$i],
                        "supervisor_id" => $competitionDetails["supervisor_id"],
                        "prestasi_id" => $prestasiId,
                    ]
                );
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
}