<?php

namespace Jalejandro\Tdd;

use InvalidArgumentException;

class FizzBuzz
{
    public function getFizzBuzz(int $number): string
    {
        $this->isLessThanOne($number);

        $this->isGreaterThanOneHundred($number);

        if ($this->isMultipleOfThreeAndFive($number)) {
            $result = 'FizzBuzz';
        } elseif ($this->isMultipleOfThree($number)) {
            $result = 'Fizz';
        } elseif ($this->isMultipleOfFive($number)) {
            $result = 'Buzz';
        } else {
            $result = (string) $number;
        }

        return $result;
    }

    private function isLessThanOne(int $number): void
    {
        if ($number < 1) {
            throw new InvalidArgumentException('Number must be greater than zero');
        }
    }

    private function isGreaterThanOneHundred(int $number): void
    {
        if ($number > 100) {
            throw new InvalidArgumentException('Number must be less than 100');
        }
    }

    private function isMultipleOfThree(int $number): bool
    {
        return 0 === ($number % 3);
    }

    private function isMultipleOfFive(int $number): bool
    {
        return 0 === ($number % 5);
    }

    private function isMultipleOfThreeAndFive(int $number): bool
    {
        return $this->isMultipleOfThree($number) && $this->isMultipleOfFive($number);
    }
}