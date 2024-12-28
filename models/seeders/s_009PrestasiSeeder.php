<?php

use app\constant\ValidationState;
use app\Models\BaseSeeder;
use app\Models\Database\prestasiCore\Prestasi;

class s_009PrestasiSeeder implements BaseSeeder
{
    public function create(): bool
    {
        $prestasiIds = ["PRE001", "PRE002", "PRE003", "PRE004"];
        $competitionName = ["Hackathon Indonesia 2024", "UI/UX Design Competition", "National Programming Contest", "Data Science Challenge"];
        $categoryName = ["Software Development", "Design", "Programming", "Data Analytics"];
        $competitionLevel = ["Nasional", "Internasional", "Nasional", "Provinsi"];
        $place = ["Jakarta", "Malang", "Surabaya", "Bandung"];
        $dateStartCompetition = ["2024-01-15", "2024-02-01", "2024-02-15", "2024-03-01"];
        $dateEndCompetition = ["2024-01-17", "2024-02-03", "2024-02-17", "2024-03-03"];
        $competitionSource = ["Kementerian Pendidikan", "IEEE", "ICPC", "Google Developer"];
        $totalCollegeAttended = [50, 75, 30, 80];
        $totalParticipant = [150, 225, 90, 240];
        $validationState = [ValidationState::VALID, ValidationState::VALID, ValidationState::VALID, ValidationState::INVALID];
        $attachmentIds = ["ATT001", "ATT002", "ATT003", "ATT004"];
        $supervisorIds = ["192345601", "192345602", "192345603", "192345604"];

        for ($i = 0; $i < count($prestasiIds); $i++) {
            $res = Prestasi::insert([
                "id" => $prestasiIds[$i],
                "competition_name" => $competitionName[$i],
                "category_name" => $categoryName[$i],
                "competition_level" => $competitionLevel[$i],
                "place" => $place[$i],
                "date_start_competition" => $dateStartCompetition[$i],
                "date_end_competition" => $dateEndCompetition[$i],
                "competition_source" => $competitionSource[$i],
                "total_college_attended" => $totalCollegeAttended[$i],
                "total_participant" => $totalParticipant[$i],
                "validation_state" => $validationState[$i],
                "attachment_id" => $attachmentIds[$i],
                "supervisor_id" => $supervisorIds[$i]
            ]);

            if (!$res) {
                return false;
            }
        }

        return true;
    }

    public function delete(): bool
    {
        return Prestasi::deleteAll();
    }
}
