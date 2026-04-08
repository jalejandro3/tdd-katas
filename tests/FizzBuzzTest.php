<?php

namespace Jalejandro\tests;

use InvalidArgumentException;
use Jalejandro\Tdd\FizzBuzz;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass( FizzBuzz::class)]
class FizzBuzzTest extends TestCase
{
    private FizzBuzz $fizzBuzz;

    protected function setUp(): void
    {
        $this->fizzBuzz = new FizzBuzz();
    }

    public function test_return_number_between_1_and_100()
    {
        $result = $this->fizzBuzz->getFizzBuzz(1);
        $this->assertEquals("1", $result);
    }

    public function test_throws_exception_when_number_is_less_than_one()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->fizzBuzz->getFizzBuzz(0);
    }

    public function test_throws_exception_when_number_is_greater_than_100()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->fizzBuzz->getFizzBuzz(101);
    }

    public function test_return_fizz_when_number_is_multiple_of_three()
    {
        $result = $this->fizzBuzz->getFizzBuzz(3);
        $this->assertEquals('Fizz', $result);
    }

    public function test_return_buzz_when_number_is_multiple_of_five()
    {
        $result = $this->fizzBuzz->getFizzBuzz(5);
        $this->assertEquals('Buzz', $result);
    }

    public function test_return_fizzbuzz_when_number_is_multiple_of_three_and_five()
    {
        $result = $this->fizzBuzz->getFizzBuzz(15);
        $this->assertEquals('FizzBuzz', $result);
    }

    public function test_return_number_when_number_is_not_multiple_of_three_and_five()
    {
        $result = $this->fizzBuzz->getFizzBuzz(7);
        $this->assertEquals('7', $result);
    }
}
