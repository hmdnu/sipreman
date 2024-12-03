<?php

use app\models\BaseSeeder;
use app\models\database\prestasiCore\Loa;

class s_007LoaSeeder implements BaseSeeder
{
    public function create(): array
    {
        $loaIds = ["LOA001", "LOA002", "LOA003", "LOA004"];
        $loaDate = ["2024-01-15", "2024-01-16", "2024-01-17", "2024-01-18"];
        $loaNumber = ["001/LOA/I/2024", "002/LOA/I/2024", "003/LOA/I/2024", "004/LOA/I/2024"];
        $pdfPath = ["storage/loa/loa_001.pdf", "storage/loa/loa_002.pdf", "storage/loa/loa_003.pdf",  "storage/loa/loa_004.pdf"];

        $res = [];

        for ($i = 0; $i < count($loaIds); $i++) {
            $res[$i] = Loa::insert([
                "id" => $loaIds[$i],
                "date" => $loaDate[$i],
                "loa_number" => $loaNumber[$i],
                "pdf_path" => $pdfPath[$i]
            ]);
        }

        return $res;
    }
    
    public function delete(): array
    {
        return Loa::deleteAll();
    }
}