<?php

namespace Jalejandro\Tdd;

class StringCalculator
{
    public function add(string $numbers): int
    {
        $this->validateNoNegatives($numbers);

        $delimiter = '/[\n,]/';

        if (str_starts_with($numbers, '//')) {
            preg_match('/\/\/(.+)\n(.*)$/s', $numbers, $matches);

            $delimiter = '/' . preg_quote($matches[1], '/') . '/';
            $numbers = $matches[2];
        }

        return array_sum(array_map('intval', preg_split($delimiter, $numbers)));
    }

    private function validateNoNegatives(string $numbers): void
    {
        if (preg_match_all('/-\d+/', $numbers, $matches)) {
            throw new \InvalidArgumentException('negatives not allowed: ' . implode(', ', $matches[0]));
        }
    }
}