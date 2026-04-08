<?php

namespace Jalejandro\tests;

use Jalejandro\Tdd\RomanNumerals;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(RomanNumerals::class)]
class RomanNumeralsTest extends TestCase
{
    private RomanNumerals $romanNumerals;

    protected function setUp(): void
    {
        $this->romanNumerals = new RomanNumerals();
    }

    public static function numbersProvider(): array
    {
        return [
            [1, 'I'],
            [2, 'II'],
            [3, 'III'],
            [4, 'IV'],
            [5, 'V'],
            [10, 'X'],
            [40, 'XL'],
            [50, 'L'],
            [1994, 'MCMXCIV'],
        ];
    }

    #[DataProvider('numbersProvider')]
    public function test_convert_number_to_roman_numerals(int $number, string $expected)
    {
        $this->assertEquals($expected, $this->romanNumerals->convert($number));
    }

    public function test_convert_number_to_roman_numerals_with_invalid_number_zero()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Number must be between 1 and 3999');
        $this->romanNumerals->convert(0);
    }

    public function test_convert_number_to_roman_numerals_with_invalid_number_4000()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Number must be between 1 and 3999');
        $this->romanNumerals->convert(4000);
    }
}