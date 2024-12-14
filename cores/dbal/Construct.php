<?php

namespace app\cores\dbal;

use app\cores\Database;
use app\constant\Config;
use app\helpers\LogError;
use Exception;

class Construct
{
    private Database $db;
    private array $sql = [];
    private string $query;
    private array $params = [];
    private array $columnResults = [];
    private string $columns = "";
    private string $table = "";

    public function __construct()
    {
        $this->db = new Database(Config::getConfig());
    }

    public function query(string $query): self
    {
        $this->sql[] = $query;
        return $this;
    }

    public function createTable(string $tableName, callable $callback): self
    {
        $column = new Column();
        $callback($column);

        $columns = implode(", ", $column->getColumns());

        $this->sql[] = "IF NOT EXISTS (
                    SELECT *
                    FROM sysobjects
                    WHERE name = '$tableName' AND xtype = 'U'
                )
                BEGIN
                    CREATE TABLE [$tableName] (
                        $columns
                    )
                END;";

        return $this;
    }

    public function alterTable(string $tableName, callable $callback): self
    {
        $column = new Column();
        $callback($column);
        $alterations = $column->getAlterations();

        foreach ($alterations as $alteration) {
            $this->sql[] = "ALTER TABLE [$tableName]
                        ADD CONSTRAINT [{$alteration["constraintName"]}] FOREIGN KEY ([{$alteration["columnName"]}])
                        REFERENCES [{$alteration["referencedTable"]}] ([{$alteration["referencedColumn"]}])
                        ON DELETE {$alteration["onDelete"]} ON UPDATE {$alteration["onUpdate"]};";
        }


        return $this;
    }

    public function dropTable(string $tableName): self
    {
        $this->sql[] = "DROP TABLE IF EXISTS [$tableName]";
        return $this;
    }

    public function select(string ...$column): self
    {
        $this->columns = implode(", ", $column);

        return $this;
    }

    public function from(string $table, string $alias = "*"): self
    {
        $aliasName = $alias === "*" ? "" : " AS $alias";

        $this->table = "$table$aliasName";

        return $this;
    }

    public function bindParams(string $param, string $value): self
    {
        $this->params[$param] = $value;

        return $this;
    }

    public function get(): self
    {
        $this->sql[] = "SELECT $this->columns FROM $this->table";

        return $this;
    }


    public function execute(): self|bool
    {
        foreach ($this->sql as $sql) {
            try {
                $prepare = $this->db::getConnection()->prepare($sql);

                foreach ($this->params as $param => $value) {
                    $prepare->bindValue($param, $value, \PDO::PARAM_STR);
                }

                $exec = $prepare->execute();

                if (!$exec) {
                    return false;
                }

                if (preg_match('/^\s*(SELECT|SHOW|DESCRIBE|EXPLAIN)/i', $sql)) {
                    $this->columnResults[] = $prepare->fetchAll(\PDO::FETCH_ASSOC) ?: null;
                    return $this;
                }

                return true;
            } catch (\PDOException $err) {
                LogError::log($err);
                return false;
            }
        }
        return $this;
    }

    public function fetchColumn(): ?array
    {
        return $this->columnResults;
    }
}
