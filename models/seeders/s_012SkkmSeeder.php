<?php

use app\models\BaseSeeder;
use app\models\database\prestasiCore\Skkm;

class s_012SkkmSeeder implements BaseSeeder
{
    public function create(): array
    {
        $skkmIds = ["SKKM001", "SKKM002", "SKKM003", "SKKM004"];
        $nim = ["210010001", "210010002", "210010003", "210010004"];
        $prestasiIds = ["PRE001", "PRE002", "PRE003", "PRE004"];
        $certificateNumber = ["CERT/2024/001", "CERT/2024/002", "CERT/2024/003", "CERT/2024/004"];
        $level = ["Nasional", "Internasional", "Nasional", "Provinsi"];
        $certificatePath = [
            "public/document/certif_001.pdf",
            "public/document/certif_002.pdf",
            "public/document/certif_003.pdf",
            "public/document/certif_004.pdf"
        ];
        $point = [6.0, 5.0, 6.0, 1.0];

        $res = [];

        for ($i = 0; $i < count($skkmIds); $i++) {
            $res[$i] = Skkm::insert([
                "id" => $skkmIds[$i],
                "nim" => $nim[$i],
                "prestasi_id" => $prestasiIds[$i],
                "certificate_number" => $certificateNumber[$i],
                "level" => $level[$i],
                "certificate_path" => $certificatePath[$i],
                "point" => $point[$i]
            ]);
        }

        return $res;
    }

    public function delete(): array
    {
        return Skkm::deleteAll();
    }
}
