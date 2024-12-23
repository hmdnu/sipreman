<?php

namespace app\cores\dbal\dml;

use app\cores\dbal\BaseConstruct;
use app\cores\dbal\DML;

class Insertion extends BaseConstruct implements DML
{
    private string $tableName;
    private array $columns = [];
    private array $columnValues = [];
    private array $params = [];

    public function __construct(string $tableName)
    {
        $this->tableName = $tableName;
    }

    public function values(array $data): self
    {
        $this->columns = array_keys($data);
        $this->columnValues = array_values($data);

        return $this;
    }

    public function bindParams(string|int $params, mixed $value): self
    {
        $this->params[$params] = $value;
        return $this;
    }

    /**
     * return boolean, only execute the query
     * @return bool
     */

    public function execute(): bool
    {

        $columns = [];
        $valueGroups = [];

        // Populate columns
        foreach ($this->columns as $value) {
            $columns[] = $value;
        }

        // Populate valueGroups
        for ($i = 0; $i < count($this->columnValues); $i += count($this->columns)) {
            $rowValues = array_slice($this->columnValues, $i, count($this->columns));
            $rowValues = array_map(function ($val) {

                if ($val === "?") {
                    return $val;
                }

                return is_string($val) ? "'" . addslashes($val) . "'" : $val;
            }, $rowValues);

            $valueGroups[] = "(" . implode(", ", $rowValues) . ")";
        }

        // Build SQL string
        $sql = sprintf(
            "INSERT INTO [%s] (%s) VALUES %s;",
            $this->tableName,
            implode(", ", $columns),
            implode(", ", $valueGroups)
        );


        return $this->executeSql($sql, $this->params);
    }

    /**
     * execute query and return the columns
     * @return array
     */

    public function fetch(): array
    {
        $res = $this->execute();

        if (!$res) {
            return [];
        }

        return $this->fetchColumn();
    }
}
