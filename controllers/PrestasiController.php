<?php

namespace app\controllers;

use app\cores\Request;
use app\cores\Response;
use app\helpers\CompetitionRequest;
use app\helpers\UUID;
use app\models\database\prestasiCore\PrestasiTeam;
use Exception;
use app\models\database\prestasiCore\Prestasi;

class PrestasiController extends BaseController
{
    private string $baseUploadDir = "./public/uploads";

    public function postPrestasi(Request $req, Response $res): void
    {
        $body = $req->body();
        $file = $req->file();

        $competitionRequest = new CompetitionRequest($body);
        $studentDetails = $competitionRequest->getStudentDetails();
        $competitionDetails = $competitionRequest->getCompetitionDetails();

        echo "<pre>";
        var_dump($studentDetails);
        echo "</pre>";
        exit;

        try {

//            for ($i = 0; $i < count($studentDetails); $i++) {
//                $prestasi = Prestasi::insert([
//                        "id" => UUID::generate(),
//                        "nim" => $studentDetails[$i]["nim"],
//                        "competition_name" => $competitionDetails["competition_name"],
//                        "category_name" => $competitionDetails["category_name"],
//                        "competition_level" => $competitionDetails["competition_level"],
//                        "place" => $competitionDetails["place"],
//                        "date_start_competition" => $competitionDetails["date_start_competition"],
//                        "date_end_competition" => $competitionDetails["date_end_competition"],
//                        "competition_source" => $competitionDetails["competition_source"],
//                        "total_college_attended" => $competitionDetails["total_college_attended"],
//                        "total_participant" => $competitionDetails["total_participant"],
//                        "is_validate" => 0,
//                        "attachment_id" => $attachmentIds[$i],
//                        "supervisor_id" => $supervisorIds[$i]
//                    ]
//                );
//            }
//
//
//            for ($i = 0; $i < count($studentDetails); $i++) {
//                $prestasiTeam = PrestasiTeam::insert([
//                    'id' => UUID::generate(),
//                    'is_leader' => $studentDetails[],
//                    'is_member' => $isMember[$i],
//                    'supervisor_id' => $supervisorIds[$i],
//                    'nim' => $nim[$i],
//                    'prestasi_id' => $prestasiIds[$i]
//                ]);
//            }


        } catch (Exception $e) {

        }

    }

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
        $targetFile = "$dir/" . basename($fileName);

        return [
            "isOk" => move_uploaded_file($tmpName, $targetFile),
            "filePath" => $targetFile
        ];
    }

    private function uploadImg(string $tmpName, string $fileName): array
    {
        $dir = $this->baseUploadDir . "/img";
        $targetFile = "$dir/" . basename($fileName);

        return [
            "isOk" => move_uploaded_file($tmpName, $targetFile),
            "filePath" => $targetFile
        ];
    }
}
