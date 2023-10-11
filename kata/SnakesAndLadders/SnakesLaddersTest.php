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
        yield 'player 1 just throws 1 & 1' => [
            [
                'Player 1 is on square 38',
            ],
            [
                [1, 1],
            ]
        ];

        yield 'simple game with 4 turns' => [
            [
                'Player 1 is on square 38',
                'Player 1 is on square 44',
                'Player 2 is on square 31',
                'Player 1 is on square 25',
            ],
            [
                [1, 1],
                [1, 5],
                [6, 2],
                [1, 1],
            ]
        ];
    }
}