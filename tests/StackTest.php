<?php

namespace Jalejandro\tests;

use Jalejandro\Tdd\Stack;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Stack::class)]
class StackTest extends TestCase
{
    private Stack $stack;

    protected function setUp(): void
    {
        $this->stack = new Stack();
    }

    public function test_empty_stack_with_is_empty_method()
    {
        $this->assertTrue($this->stack->isEmpty());
    }

    public function test_empty_stack_with_size_method()
    {
        $this->assertEquals(0, $this->stack->size());
    }

    public function test_pushing_element_stack_not_empty()
    {
        $this->stack->push(1);
        $this->assertFalse($this->stack->isEmpty());
    }

    public function test_pushing_element_stack_size_equals_1()
    {
        $this->stack->push(1);
        $this->assertEquals(1, $this->stack->size());
    }

    public function test_pop_element_from_stack_return_last_element()
    {
        $this->stack->push(1);
        $this->stack->push(2);
        $this->assertEquals(2, $this->stack->pop());
    }

    public function test_pop_element_from_stack_size_equals_1()
    {
        $this->stack->push(1);
        $this->stack->push(2);
        $this->stack->pop();
        $this->assertEquals(1, $this->stack->size());
    }

    public function test_pop_element_from_empty_stack()
    {
        $this->expectException(\UnderflowException::class);
        $this->expectExceptionMessage('empty stack');
        $this->stack->pop();
    }

    public function test_top_element_return_last_element()
    {
        $this->stack->push(1);
        $this->stack->push(2);
        $this->assertEquals(2, $this->stack->top());
    }

    public function test_top_element_keep_stack_size()
    {
        $this->stack->push(1);
        $this->stack->push(2);
        $this->stack->top();
        $this->assertEquals(2, $this->stack->size());
    }

    public function test_top_element_from_empty_stack()
    {
        $this->expectException(\UnderflowException::class);
        $this->expectExceptionMessage('empty stack');
        $this->stack->top();
    }
}