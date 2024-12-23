<?php

use app\models\BaseSeeder;
use app\models\database\prestasiCore\Loa;

class s_007LoaSeeder implements BaseSeeder
{
    public function create(): bool
    {
        $loaIds = ["LOA001", "LOA002", "LOA003", "LOA004"];
        $loaDate = ["2024-01-15", "2024-01-16", "2024-01-17", "2024-01-18"];
        $loaNumber = ["001/LOA/I/2024", "002/LOA/I/2024", "003/LOA/I/2024", "004/LOA/I/2024"];
        $loaPdfPath = [
            "pubic/document/loa_001.pdf",
            "pubic/document/loa_001.pdf",
            "pubic/document/loa_001.pdf",
            "pubic/document/loa_001.pdf"
        ];

        for ($i = 0; $i < count($loaIds); $i++) {
            $res = Loa::insert([
                "id" => $loaIds[$i],
                "date" => $loaDate[$i],
                "loa_number" => $loaNumber[$i],
                "loa_pdf_path" => $loaPdfPath[$i]
            ]);

            if (!$res) {
                return false;
            }
        }

        return true;
    }
    
    public function delete(): bool
    {
        return Loa::deleteAll();
    }
}