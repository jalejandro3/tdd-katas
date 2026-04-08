<?php

namespace Jalejandro\Tdd;

use InvalidArgumentException;

class Calculator
{
    public function divide(float $a, float $b): float
    {
        if ($b === 0.0) {
            throw new InvalidArgumentException('Division by zero');
        }

        return $a / $b;
    }
}