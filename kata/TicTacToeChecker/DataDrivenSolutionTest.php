<?php

declare(strict_types=1);

namespace Kata\TicTacToeChecker;

use Generator;
use PHPUnit\Framework\TestCase;

/**
 * Testing the Tic-Tac-Toe Checker Kata. Testing is knowing!
 */
final class DataDrivenSolutionTest extends TestCase
{
    /**
     * @dataProvider provide
     */
    public function testDataDrivenSolution(int $expected, array $boarc)
    {
        self::assertSame($expected, (new DataDrivenSolution())->is_solved($boarc));
    }

    public function provide(): Generator
    {
        yield 'X wins horizontally 1' => [
            1,
            [[1, 1, 1],
             [0, 2, 0],
             [2, 0, 0]],
        ];

        yield 'X wins horizontally 2' => [
            1,
            [[2, 2, 0],
             [2, 1, 2],
             [1, 1, 1]],
        ];


        yield 'X wins vertically 1' => [
            1,
            [[2, 1, 0],
             [0, 1, 0],
             [2, 1, 2]],
        ];

        yield 'X wins vertically 2' => [
            1,
            [[2, 2, 1],
             [1, 1, 1],
             [2, 2, 1]],
        ];


        yield 'X wins diagonally 1' => [
            1,
            [[1, 2, 2],
             [0, 1, 1],
             [2, 2, 1]],
        ];

        yield 'X wins diagonally 2' => [
            1,
            [[1, 2, 1],
             [2, 1, 1],
             [1, 2, 2]],
        ];

        yield 'O wins horizontally 1' => [
            2,
            [[2, 2, 2],
             [1, 0, 1],
             [0, 1, 1]],
        ];

        yield 'O wins horizontally 2' => [
            2,
            [[1, 1, 2],
             [2, 2, 2],
             [0, 1, 1]],
        ];

        yield 'O wins vertically 1' => [
            2,
            [[2, 1, 0],
             [2, 0, 0],
             [2, 1, 0]],
        ];

        yield 'O wins vertically 2' => [
            2,
            [[0, 2, 1],
             [1, 2, 1],
             [1, 2, 0]],
        ];

        yield 'O wins vertically 3' => [
            2,
            [[2, 1, 2],
             [1, 1, 2],
             [1, 2, 2]],
        ];


        yield 'O wins diagonally 1' => [
            2,
            [[2, 2, 1],
             [1, 2, 1],
             [2, 1, 2]],
        ];

        yield 'O wins diagonally 2' => [
            2,
            [[1, 1, 2],
             [2, 2, 1],
             [2, 1, 1]],
        ];

        yield 'draw 1' => [
            0,
            [[1, 1, 2],
             [2, 2, 1],
             [1, 2, 1]],
        ];

        yield 'draw 2' => [
            0,
            [[2, 2, 1],
             [1, 1, 2],
             [2, 1, 2]],
        ];

        yield 'draw 3' => [
            0,
            [[2, 1, 2],
             [1, 2, 1],
             [1, 2, 1]],
        ];

        yield 'draw 4' => [
            0,
            [[2, 1, 1],
             [1, 2, 2],
             [2, 2, 1]],
        ];

        yield 'draw 5' => [
            0,
            [[2, 1, 2],
             [2, 2, 1],
             [1, 2, 1]],
        ];

        yield 'all empty' => [
            -1,
            [[0, 0, 0],
                [0, 0, 0],
                [0, 0, 0]],
        ];

        yield 'some empty 1' => [
            -1,
            [[1, 1, 2],
             [0, 0, 2],
             [0, 0, 0]],
        ];

        yield 'some empty 2' => [
            -1,
            [[1, 1, 2],
             [1, 0, 2],
             [2, 2, 1]],
        ];

        yield 'some empty 3' => [
            -1,
            [[1, 1, 2],
             [1, 2, 2],
             [0, 2, 1]],
        ];
    }
}
