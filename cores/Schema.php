<?php

namespace app\cores;

class Schema
{
    public static function createTableIfNotExist(string $tableName, callable $callback): array
    {
        $blueprint = new Blueprint($tableName);
        $callback($blueprint);
        $query = $blueprint->getColumnsAndConstraints();
        $column = $query["columns"];
        $constraint = $query["constraints"];

        $tsql = "IF NOT EXISTS (
                SELECT *
                FROM sysobjects
                WHERE name = '$tableName' AND xtype = 'U'
            )
            BEGIN
                CREATE TABLE [$tableName] ($column
           ";

        if (!empty($constraint)) {
            $tsql .= ", $constraint";
        }

        $tsql .= ") END;";

        return $blueprint->execute($tsql);
    }

    public static function insertInto(string $tableName, callable $callback): array
    {
        $blueprint = new Blueprint($tableName);
        $callback($blueprint);
        $insertions = $blueprint->getInsertions();

        $results = [];

        foreach ($insertions as $insertion) {
            $results[] = $blueprint->execute($insertion["query"], $insertion["params"]);
        }

        return $results;
    }

    public static function dropTableIfExist(string $tableName): array
    {
        $blueprint = new Blueprint($tableName);
        $tsql = "DROP TABLE IF EXISTS [$tableName];";
        return $blueprint->execute($tsql);
    }

    public static function alterTable(string $tableName, callable $callback): array
    {
        $blueprint = new Blueprint($tableName);
        $callback($blueprint);
        $tsql = $blueprint->getAlterations();

        $results = [];
        foreach ($tsql as $query) {
            $results[] = $blueprint->execute($query);
        }

        return $results;
    }

    public static function deleteFrom(string $tableName): array
    {
        $blueprint = new Blueprint($tableName);
        $tsql = "DELETE FROM [$tableName];";
        return $blueprint->execute($tsql);
    }

    public static function selectFrom(string $tableName, callable $callback): array
    {
        $blueprint = new Blueprint($tableName);
        $callback($blueprint);
        $selections = $blueprint->getSelection();

        return $blueprint->execute($selections["query"]);
    }

    public static function selectWhereFrom(string $tableName, callable $callback): array
    {
        $blueprint = new Blueprint($tableName);
        $callback($blueprint);
        $selections = $blueprint->getSelection();

        return $blueprint->execute($selections["query"], $selections["params"]);
    }

    public static function join(string $leftTable, callable $callback): array
    {
        $blueprint = new Blueprint($leftTable);
        $callback($blueprint);
        $tsql = $blueprint->getSelection();

        $results = [];

        foreach ($tsql as $query) {
            $results[] = $blueprint->execute($query);
        }

        return $results;
    }

    public static function query(string $tableName, string $query): array
    {
        $blueprint = new Blueprint($query);
        return $blueprint->execute($query);
    }
}