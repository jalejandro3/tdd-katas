<?php

namespace Jalejandro\Tdd;

class LegacyCalculator
{
    private array $history = [];

    public function calculate(string $expression): float
    {
        $expression = trim($expression);

        if (empty($expression)) {
            throw new \InvalidArgumentException('Expression cannot be empty');
        }

        if (preg_match('/^(-?\d+\.?\d*)\s*([\+\-\*\/])\s*(-?\d+\.?\d*)$/', $expression, $matches)) {
            $a = (float) $matches[1];
            $operator = $matches[2];
            $b = (float) $matches[3];

            switch ($operator) {
                case '+':
                    $result = $a + $b;
                    break;
                case '-':
                    $result = $a - $b;
                    break;
                case '*':
                    $result = $a * $b;
                    break;
                case '/':
                    if ($b == 0) {
                        throw new \DivisionByZeroError('Division by zero');
                    }
                    $result = $a / $b;
                    break;
                default:
                    throw new \InvalidArgumentException('Unknown operator: ' . $operator);
            }

            $this->history[] = $expression . ' = ' . $result;
            return $result;
        }

        throw new \InvalidArgumentException('Invalid expression: ' . $expression);
    }

    public function getHistory(): array
    {
        return $this->history;
    }

    public function clearHistory(): void
    {
        $this->history = [];
    }
}
