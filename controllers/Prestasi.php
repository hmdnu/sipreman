<?php

namespace app\controllers;

use app\controllers\BaseController;
use app\cores\Request;
use app\cores\Response;
use app\helpers\Dump;
use Exception;

class Prestasi extends BaseController
{
    private string $baseUploadDir = "./public/uploads";

    public function postPrestasi(Request $req, Response $res): void
    {
        $body = $req->body();
        $file = $req->file();

        Dump::out($body, $file);

        // try {
        //     $isUploaded = $this->handleFileUpload($file["file-upload"]);

        //     var_dump($isUploaded);
        // } catch (\Exception $th) {
        //     var_dump($th);
        // }
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
            $res = $this->uploadImgs($tmpName, $fileName);
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

    private function uploadImgs(string $tmpName, string $fileName): array
    {
        $dir = $this->baseUploadDir . "/img";
        $targetFile = "$dir/" . basename($fileName);

        return [
            "isOk" => move_uploaded_file($tmpName, $targetFile),
            "filePath" => $targetFile
        ];
    }
}
