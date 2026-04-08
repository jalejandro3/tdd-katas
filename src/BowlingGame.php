<?php

namespace Jalejandro\Tdd;

class BowlingGame
{
    private int $score = 0;

    public function roll(int $pins): void
    {
        $this->score += $pins;
    }

    public function score(): int
    {
        return $this->score;
    }
}