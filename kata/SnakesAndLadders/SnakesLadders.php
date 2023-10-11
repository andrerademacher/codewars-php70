<?php

declare(strict_types=1);

namespace Kata\SnakesAndLadders;

final class SnakesLadders
{
    const MAP = [
        2 => 38, 7 => 14, 8 => 31,
        15 => 26, 16 => 6,
        21 => 42, 28 => 84,
        36 => 44,
        46 => 25, 49 => 11,
        51 => 67,
        62 => 19, 64 => 60,
        71 => 91, 74 => 53, 78 => 98,
        87 => 94, 89 => 68,
        92 => 88, 95 => 75, 99 => 80,

        // implicit snakes in case player goes over 100
        101 => 80, 102 => 98, 103 => 97, 104 => 96, 105 => 75, 106 => 94,
        107 => 93, 108 => 88, 109 => 91, 110 => 90, 111 => 68,
    ];

    private $currentPlayer = 1;

    private $playerPosition = [
        1 => 0,
        2 => 0,
    ];

    /**
     * Initializes the game.
     */
    public function __construct()
    {
    }

    /**
     * The turn of the current player is executed.
     */
    public function play(int $die1, int $die2): string
    {
        // in case one player has already won, don't execute another turn
        if (in_array(100, $this->playerPosition, true)) {
            return 'Game over!';
        }

        // move the player token
        $newPosition = $this->playerPosition[$this->currentPlayer] + $die1 + $die2;
        $finalPosition = self::MAP[$newPosition] ?? $newPosition;

        // report the result string
        $result = ($newPosition === 100)
            ? 'Player ' . $this->currentPlayer . ' Wins!'
            : 'Player ' . $this->currentPlayer . ' is on square ' . $finalPosition;

        $this->playerPosition[$this->currentPlayer] = $finalPosition;

        // if the current player rolled a double, it's his turn again, else switch players
        $this->currentPlayer = ($die1 === $die2)
            ? $this->currentPlayer
            : $this->currentPlayer ^ 3;

        return $result;
    }
}