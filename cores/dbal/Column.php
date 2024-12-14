<?php

namespace app\cores\dbal;

class Column
{
    private array $columns = [];
    private array $references = [];
    private array $cascades = [];


    public function string(string $columnName, int $length = 225): Constraint
    {
        $constraint = new Constraint();

        $this->columns[$columnName] = [
            "definition" => "[$columnName] nvarchar($length)",
            "constraint" => $constraint
        ];

        return $constraint;
    }

    public function int(string $columnName): Constraint
    {
        $constraint = new Constraint();
        $this->columns[$columnName] = [
            "definition" => "[$columnName] int",
            "constraint" => $constraint
        ];

        return $constraint;
    }

    public function tinyint(string $columnName): Constraint
    {
        $constraint = new Constraint();
        $this->columns[$columnName] = [
            "definition" => "[$columnName] tinyint",
            "constraint" => $constraint
        ];

        return $constraint;
    }

    public function date(string $columnName): Constraint
    {
        $constraint = new Constraint();
        $this->columns[$columnName] = [
            "definition" => "[$columnName] date",
            "constraint" => $constraint
        ];

        return $constraint;
    }

    public function datetime(string $columnName): Constraint
    {
        $constraint = new Constraint();
        $this->columns[$columnName] = [
            "definition" => "[$columnName] datetime",
            "constraint" => $constraint
        ];

        return $constraint;
    }

    public function decimal(string $columnName): Constraint
    {
        $constraint = new Constraint();
        $this->columns[$columnName] = [
            "definition" => "[$columnName] decimal",
            "constraint" => $constraint
        ];

        return $constraint;
    }

    public function addForeignKey(string $columnName,string $constraintName): self
    {
        $this->columns[] = [
            "columnName" => $columnName,
            "constraintName" => $constraintName
        ];

        return $this;
    }

    public function reference(string $referencedTable, string $referencedColumn): self
    {
        $this->references[] = [
            "referencedTable" => $referencedTable,
            "referencedColumn" => $referencedColumn
        ];

        return $this;
    }

    public function cascade(string $onDelete = "NO ACTION", string $onUpdate = "NO ACTION"): self
    {
        $this->cascades[] = [
            "onDelete" => $onDelete,
            "onUpdate" => $onUpdate
        ];

        return $this;
    }

    public function getAlterations(): array
    {
        $alterations = [];

        foreach ($this->columns as $index => $column) {
            $alterations[] = [
                "columnName" => $column["columnName"],
                "constraintName" => $column["constraintName"],
                "referencedTable" => $this->references[$index]["referencedTable"] ?? null,
                "referencedColumn" => $this->references[$index]["referencedColumn"] ?? null,
                "onDelete" => $this->cascades[$index]["onDelete"] ?? "NO ACTION",
                "onUpdate" => $this->cascades[$index]["onUpdate"] ?? "NO ACTION",
            ];
        }

        return $alterations;
    }


    public function getColumns(): array
    {
        $result = [];
        foreach ($this->columns as $key => $data) {
            $result[] = $data["definition"] . $data["constraint"]->getConstraints();
        }

        return $result;
    }
}
