<?php

namespace Jalejandro\Tdd;

class Stack
{
    private array $elements = [];

    public function isEmpty(): bool
    {
        return empty($this->elements);
    }

    public function size(): int
    {
        return count($this->elements);
    }

    public function push(mixed $element): void
    {
        $this->elements[] = $element;
    }

    public function pop(): mixed
    {
        $this->validateEmptyStack();

        return array_pop($this->elements);
    }

    public function top(): mixed
    {
        $this->validateEmptyStack();

        return end($this->elements);
    }

    private function validateEmptyStack(): void
    {
        if ($this->isEmpty()) {
            throw new \UnderflowException('empty stack');
        }
    }
}
