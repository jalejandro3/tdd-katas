<?php

namespace Jalejandro\tests;

use InvalidArgumentException;
use Jalejandro\Tdd\Calculator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Calculator::class)]
class CalculatorTest extends TestCase
{
    public function test_divide_by_two_numbers()
    {
        $calc = new Calculator();
        $result = $calc->divide(10, 2);
        $this->assertEquals(5, $result);
    }

    public function test_divide_by_zero_number()
    {
        $calc = new Calculator();
        $this->expectException(InvalidArgumentException::class);
        $calc->divide(10, 0);
    }
}