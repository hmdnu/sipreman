<?php

namespace app\cores\dbal;

use app\cores\dbal\ddl\Alteration;
use app\cores\dbal\ddl\Column;
use app\cores\dbal\ddl\Table;
use app\cores\dbal\dml\Deletion;
use app\cores\dbal\dml\Insertion;
use app\cores\dbal\dml\Selection;
use app\cores\dbal\dml\Updation;
use app\cores\dbal\dml\View;

class Construct
{
    public function select(string ...$column): Selection
    {
        $columns = implode(", ", $column);

        return new Selection($columns);
    }

    public function insert(string $tableName): Insertion
    {
        return new Insertion($tableName);
    }

    public function query(string $query): Query
    {
        $sql = $query[strlen($query) - 1] === ";" ? str_replace(";", "", $query) : $query;
        $sql .= ";";

        return new Query($sql);
    }

    public function create(string $tableName, callable $callback): Table
    {
        $column = new Column();
        $callback($column);

        $columns = $column->getColumns();
        $table = new Table($tableName, $columns);
        $table->buildCreate();

        return $table;
    }

    public function drop(string $tableName): Table
    {
        return new Table($tableName, []);
    }

    public function update(string $tableName, string $aliasName = null): Updation
    {
        return new Updation($tableName, $aliasName);
    }

    public function delete(string $tableName, string $aliasName = null): Deletion
    {
        return new Deletion($tableName, $aliasName);
    }

    public function procedure(string $procedureName): Procedure
    {
        return new Procedure($procedureName);
    }

    public function call(string $procedureName, array $params): Procedure
    {
        $sql = "EXEC $procedureName ";
        $parameters = [];

        foreach ($params as $key => $value) {
            if (is_null($value)) {
                $parameters[] = "@$key = NULL";
            } elseif (is_string($value)) {
                $parameters[] = "@$key = '" . addslashes($value) . "'";
            } else {
                $parameters[] = "@$key = $value";
            }
        }

        $sql .= implode(", ", $parameters) . ";";

        return new Procedure($procedureName, $sql);
    }


    public function alter(string $tableName, callable $callback): Table
    {
        $alteration = new Alteration();
        $callback($alteration);

        $columns = $alteration->getColumns();
        $table = new Table($tableName, $columns);
        $table->buildAlter();

        return $table;
    }

    public function view(string $viewName): View
    {
        return new View($viewName);
    }
}
