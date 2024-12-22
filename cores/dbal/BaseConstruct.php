<?php

namespace app\cores\dbal;

use app\constant\Config;
use app\cores\Database;
use app\helpers\LogError;

abstract class BaseConstruct
{
    private array $columnValues = [];

    abstract public function execute(): bool;

    public function executeSql(string $sql, array $params = []): bool
    {
        try {
            $db = new Database(Config::getConfig());
            $conn = $db::getConnection();

            $prepare = $conn->prepare($sql);

            foreach ($params as $key => $value) {
                $prepare->bindValue($key, $value);
            }

            $exec = $prepare->execute();

            if (!$exec) {
                return false;
            }

            if (preg_match('/^\s*(SELECT|SHOW|DESCRIBE|EXPLAIN|EXEC)/i', $sql)) {
                $this->columnValues = $prepare->fetchAll(\PDO::FETCH_ASSOC);
            }

            return true;
        } catch (\PDOException $e) {
            LogError::log($e);
        }

        return false;
    }

    public function fetchColumn(): array
    {
        return $this->columnValues;
    }
}
