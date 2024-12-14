<?php

namespace app\helpers;

class CompetitionRequest
{
    private array $body;

    public function __construct(array $body)
    {
        $this->body = $body;
    }

    public function getLoaDetails(): array
    {
        return [
            "loa_number" => $this->body["loa-number"],
            "loa_date" => $this->body["loa-date"],
        ];
    }

    public function getCompetitionDetails(): array
    {
        return [
            "supervisor_id" => $this->body["supervisor-nidn"] ?? null,
            "category_name" => $this->body["category-name"] ?? null,
            "competition_name" => $this->body["competition-name"] ?? null,
            "competition_level" => $this->body["competition-level"] ?? null,
            "place" => $this->body["place"] ?? null,
            "date_start_competition" => $this->body["date-start-competition"] ?? null,
            "date_end_competition" => $this->body["date-end-competition"] ?? null,
            "competition_source" => $this->body["competition-source"] ?? null,
            "total_college_attended" => $this->body["total-college-attended"] ?? null,
            "total_participant" => $this->body["total-participant"] ?? null,
        ];
    }

    public function getStudentDetails(): array
    {
        return [
            "nim" => $this->handleArrayInput($this->body["student-nim"] ?? []),
            "names" => $this->handleArrayInput($this->body["student-name"] ?? []),
            "majors" => $this->handleArrayInput($this->body["major"] ?? []),
            "studyPrograms" => $this->handleArrayInput($this->body["study-program"] ?? []),
            "roles" => $this->handleArrayInput($this->body["student-role"] ?? []),
        ];
    }

    private function handleArrayInput($input): array
    {
        return is_array($input) ? array_map('trim', $input) : [];
    }
}