<?php

namespace app\cores\dbal\dml;

use app\cores\dbal\BaseConstruct;
use app\cores\dbal\DML;

class Deletion extends BaseConstruct implements DML
{
    public function execute()
    {
    }

    function bindParams(int|string $params, mixed $value): self
    {
        return $this;
    }


}