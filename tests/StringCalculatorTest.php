<?php

namespace Jalejandro\tests;

use Jalejandro\Tdd\StringCalculator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(StringCalculator::class)]
class StringCalculatorTest extends TestCase
{
    private StringCalculator $stringCalculator;

    protected function setUp(): void
    {
        $this->stringCalculator = new StringCalculator();
    }

    public function test_add_empty_string()
    {
        $result = $this->stringCalculator->add("");
        $this->assertEquals(0, $result);
    }

    public function test_add_one_number()
    {
        $result = $this->stringCalculator->add('1');
        $this->assertEquals(1, $result);
    }

    public function test_add_two_numbers()
    {
        $result = $this->stringCalculator->add('1,2');
        $this->assertEquals(3, $result);
    }

    public function test_add_multiple_numbers()
    {
        $result = $this->stringCalculator->add('1,2,3,4,5');
        $this->assertEquals(15, $result);
    }

    public function test_add_numbers_with_multiple_delimiters()
    {
        $result = $this->stringCalculator->add("1\n2,3");
        $this->assertEquals(6, $result);
    }

    public function test_add_numbers_with_semicolon_as_delimiter(): void
    {
        $result = $this->stringCalculator->add("//;\n1;2");
        $this->assertEquals(3, $result);
    }

    public function test_add_numbers_with_pipe_as_delimiter(): void
    {
        $result = $this->stringCalculator->add("//|\n1|2|3");
        $this->assertEquals(6, $result);
    }

    public function test_throws_exception_when_add_negative_number()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('negatives not allowed: -2, -4');
        $this->stringCalculator->add("1,-2,3,-4");
    }
}