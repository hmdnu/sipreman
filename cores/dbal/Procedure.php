<?php

namespace app\cores\dbal;

class Procedure extends BaseConstruct
{
    private string $procedureName;
    private array $params = [];
    private string $procedureSql;
    private array $query = [];

    public function __construct(string $procedureName, string $sql = "")
    {
        $this->procedureName = $procedureName;
        $this->procedureSql = $sql;
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
        // Start with IF NOT EXISTS check
        $sql = "IF NOT EXISTS (SELECT * FROM sys.objects WHERE type = 'P' AND name = '$this->procedureName') ";
        $sql .= "BEGIN EXEC ('CREATE PROCEDURE $this->procedureName ";

        // Add procedure parameters
        foreach ($this->params as $paramName => $param) {
            $default = isset($param["default"]) ? " = {$param['default']}" : "";
            $sql .= "@$paramName {$param['dataType']}$default, ";
        }

        // Remove trailing comma
        $sql = rtrim($sql, ", ");

        // Start procedure body
        $sql .= " AS BEGIN SET NOCOUNT ON; ";

        // Add procedure queries
        $procedureBody = implode(" ", $this->query);

        // Escape single quotes for dynamic SQL
        $procedureBody = str_replace("'", "''", $procedureBody);
        $sql .= $procedureBody;

        // End procedure body
        $sql .= " END'); END;";

        return $sql;
    }


    public function as(string ...$sql): self
    {
        $this->query = $sql;

        return $this;
    }

    public function drop(): self
    {
        $this->procedureSql = "DROP PROCEDURE $this->procedureName;";

        return $this;
    }

    public function execute(): bool
    {
        if (preg_match('/^\s*(EXEC|DROP)/i', $this->procedureSql)) {
            return $this->executeSql($this->procedureSql);

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
