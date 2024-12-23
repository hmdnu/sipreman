<?php

use app\Models\BaseSeeder;
use app\Models\Database\prestasiCore\Attachment;

class s_008AttachmentSeeder implements BaseSeeder
{
    public function create(): bool
    {
        $attachmentIds = ["ATT001", "ATT002", "ATT003", "ATT004"];
        $loaIds = ["LOA001", "LOA002", "LOA003", "LOA004"];
        $certificatePath = [
            "public/document/certif_001.pdf",
            "public/document/certif_002.pdf",
            "public/document/certif_003.pdf",
            "public/document/certif_004.pdf"
        ];
        $documentationPhotoPath = [
            "public/img/photo_001.jpg",
            "public/img/photo_002.jpg",
            "public/img/photo_003.jpg",
            "public/img/photo_004.jpg"
        ];
        $posterPath = [
            "public/img/poster_001.jpg",
            "public/img/poster_002.jpg",
            "public/img/poster_003.jpg",
            "public/img/poster_004.jpg"
        ];
        $caption = [
            "Dokumentasi Kegiatan Workshop 1",
            "Dokumentasi Kegiatan Seminar 2",
            "Dokumentasi Kegiatan Pelatihan 3",
            "Dokumentasi Kegiatan Workshop 4"
        ];

        for ($i = 0; $i < count($attachmentIds); $i++) {
            $res = Attachment::insert([
                "id" => $attachmentIds[$i],
                "loa_id" => $loaIds[$i],
                "certificate_path" => $certificatePath[$i],
                "documentation_photo_path" => $documentationPhotoPath[$i],
                "poster_path" => $posterPath[$i],
                "caption" => $caption[$i]
            ]);

            if (!$res) {
                return false;
            }
        }

        return true;
    }

    public function delete(): bool
    {
        return Attachment::deleteAll();
    }
}