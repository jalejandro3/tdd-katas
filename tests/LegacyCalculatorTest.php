<?php

namespace Jalejandro\tests;

use Jalejandro\Tdd\LegacyCalculator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(LegacyCalculator::class)]
class LegacyCalculatorTest extends TestCase
{
    private LegacyCalculator $legacyCalculator;

    protected function setUp(): void
    {
        $this->legacyCalculator = new LegacyCalculator;
    }

    public function test_calculate_with_empty_expression_throws_exception()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Expression cannot be empty');
        $this->legacyCalculator->calculate('');
    }

    public function test_calculate_with_wrong_expression_throws_exception()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid expression: 2**3');
        $this->legacyCalculator->calculate('2**3');
    }

    public function test_calculate_division_by_zero_throws_exception()
    {
        $this->expectException(\DivisionByZeroError::class);
        $this->expectExceptionMessage('Division by zero');
        $this->legacyCalculator->calculate('2/0');
    }

    public function test_calculate_with_invalid_operator_throws_exception()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid expression: 2%3');
        $this->legacyCalculator->calculate('2%3');
    }

    public function test_calculate_addition_of_two_numbers()
    {
        $additionResult = $this->legacyCalculator->calculate('1+2');
        $this->assertEquals(3, $additionResult);
    }

    public function test_calculate_subtraction_of_two_numbers()
    {
        $subtractionResult = $this->legacyCalculator->calculate('10-2');
        $this->assertEquals(8, $subtractionResult);
    }

    public function test_calculate_multiplication_of_two_numbers()
    {
        $multiplicationResult = $this->legacyCalculator->calculate('2*3');
        $this->assertEquals(6, $multiplicationResult);
    }

    public function test_calculate_division_of_two_numbers()
    {
        $divisionResult = $this->legacyCalculator->calculate('10/2');
        $this->assertEquals(5, $divisionResult);
    }

    public function test_calculate_addition_of_decimal_numbers()
    {
        $additionResult = $this->legacyCalculator->calculate('1.2+2.3');
        $this->assertEquals(3.5, $additionResult);
    }

    public function test_calculate_subtraction_of_decimal_numbers()
    {
        $subtractionResult = $this->legacyCalculator->calculate('2.3-1.2');
        $this->assertEquals(1.0999999999999999, $subtractionResult);
    }

    public function test_calculate_multiplication_of_decimal_numbers()
    {
        $multiplicationResult = $this->legacyCalculator->calculate('2.3*3.4');
        $this->assertEquals(7.819999999999999, $multiplicationResult);
    }

    public function test_calculate_division_of_decimal_numbers()
    {
        $divisionResult = $this->legacyCalculator->calculate('10.5/2.3');
        $this->assertEquals(4.565217391304349, $divisionResult);
    }

    public function test_calculate_with_negative_numbers()
    {
        $additionResult = $this->legacyCalculator->calculate('5+-3');
        $this->assertEquals(2, $additionResult);
    }

    public function test_calculate_with_spaces()
    {
        $additionResult = $this->legacyCalculator->calculate(' 1 + 2 ');
        $this->assertEquals(3, $additionResult);
    }

    public function test_calculate_get_history()
    {
        $this->legacyCalculator->calculate('1+2');
        $this->legacyCalculator->calculate('2*3');
        $this->assertEquals(['1+2 = 3', '2*3 = 6'], $this->legacyCalculator->getHistory());
    }

    public function test_history_stores_trimmed_expression_with_spaces()
    {
        $this->legacyCalculator->calculate(' 1 + 2 ');
        $this->assertEquals(['1 + 2 = 3'], $this->legacyCalculator->getHistory());
}

    public function test_calculate_clear_history()
    {
        $this->legacyCalculator->calculate('1+2');
        $this->legacyCalculator->calculate('2*3');
        $this->legacyCalculator->clearHistory();
        $this->assertEquals([], $this->legacyCalculator->getHistory());
    }
}
