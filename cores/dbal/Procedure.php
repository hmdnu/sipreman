<?php

namespace app\cores\dbal;

class Procedure extends BaseConstruct
{
    private string $procedureName;
    private array $params = [];
    private string $sql;

    public function __construct(string $procedureName, string $sql = "")
    {
        $this->procedureName = $procedureName;
        $this->sql = $sql;
    }

    public function addParam(string $paramName, string $dataType, mixed $default = null): self
    {
        $this->params[$paramName] = [
            'dataType' => strtoupper($dataType),
            'default' => is_string($default) ? "'$default'" : $default,
        ];

        return $this;
    }

    private function buildProcedure(): string
    {
        $oldSql = str_replace(";", "", $this->sql);
        $sql = "CREATE PROCEDURE $this->procedureName";

        foreach ($this->params as $key => $value) {
            $default = isset($value["default"]) ? " = {$value["default"]}" : "";
            $sql .= " @{$key} {$value["dataType"]}$default";
        }

        $sql .= " AS BEGIN SET NOCOUNT ON; $oldSql; END;";

        return $sql;
    }

    public function drop(): self
    {
        $this->sql = "DROP PROCEDURE $this->procedureName;";

        return $this;
    }

    public function execute(): bool
    {
        if (preg_match('/^\s*(EXEC|DROP)/i', $this->sql)) {
            var_dump($this->sql);
            return $this->executeSql($this->sql);
        }

        $procedureSql = $this->buildProcedure();

        return $this->executeSql($procedureSql);
    }

    public function fetch(): array
    {
        $res = $this->execute();

        if (!$res) {
            return [];
        }

        return $this->fetchColumn();
    }
}