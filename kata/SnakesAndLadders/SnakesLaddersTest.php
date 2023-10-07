<?php

declare(strict_types=1);

namespace Kata\SnakesAndLadders;

use Generator;
use PHPUnit\Framework\TestCase;

final class SnakesLaddersTest extends TestCase
{
    /**
     * @dataProvider providePlay
     */
    public function testPlay(array $expectedOutput, array $diceThrows)
    {
        $game = new SnakesLadders();
        foreach ($diceThrows as $key => $diceThrow) {
            self::assertSame($expectedOutput[$key], $game->play(...$diceThrow));
        }
    }

    public function providePlay(): Generator
    {
        yield 'Player 1 just throws 1 & 1' => [
            [
                'Player 1 is on square 38',
            ],
            [
                [1, 1],
            ]
        ];
    }
}