<?php

namespace Jalejandro\tests;

use Jalejandro\Tdd\BowlingGame;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(BowlingGame::class)]
class BowlingGameTest  extends TestCase
{
    public function test_score_for_20_rolls_with_gutters_is_zero(): void
    {
        $game = new BowlingGame();
        for ($i = 0; $i < 20; $i++) {
            $game->roll(0);
        }
        $this->assertEquals(0, $game->score());
    }

    public function test_score_for_20_rolls_with_all_ones_is_twenty(): void
    {
        $game = new BowlingGame();
        for ($i = 0; $i < 20; $i++) {
            $game->roll(1);
        }
        $this->assertEquals(20, $game->score());
    }

    public function test_score_for_one_spare(): void
    {
        $game = new BowlingGame();
        $game->roll(5);
        $game->roll(5);
        $game->roll(3);

        for ($i = 0; $i < 17; $i++) {
            $game->roll(0);
        }
        $this->assertEquals(16, $game->score());
    }
}
