<?php

namespace Jalejandro\Tdd;

class RomanNumerals
{
    const array ROMAN_NUMERALS = [
        1000 => 'M',
        900 => 'CM',
        500 => 'D',
        400 => 'CD',
        100 => 'C',
        90 => 'XC',
        50 => 'L',
        40 => 'XL',
        10 => 'X',
        9 => 'IX',
        5 => 'V',
        4 => 'IV',
        1 => 'I',
    ];

    public function convert(int $number): string
    {
        $this->validateRange($number);

        $result = '';

        foreach (self::ROMAN_NUMERALS as $value => $romanNumber) {
            while ($number >= $value) {
                $result .= $romanNumber;
                $number -= $value;
            }
        }

        return $result;
    }

    private function validateRange(int $number): void
    {
        if ($number < 1 || $number > 3999) {
            throw new \InvalidArgumentException('Number must be between 1 and 3999');
        }
    }
}