<?php

namespace app\cores\dbal;


class Constraint
{
    private string $constraints = "";

    public function primary(): self
    {
        $this->constraints .= " PRIMARY KEY";
        return $this;
    }

    public function unique(): self
    {
        $this->constraints .= " UNIQUE";
        return $this;
    }

    public function getConstraints(): string
    {
        return $this->constraints;
    }
}
