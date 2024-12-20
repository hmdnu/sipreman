<?php

namespace app\cores\dbal;

interface DML
{
    public function bindParams(string|int $params, mixed $value): self;

}

