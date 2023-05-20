<?php

declare(strict_types=1);

namespace Kata\TicTacToeChecker;

/**
 * Checks the current state for a game of Tic-Tac-Toe.
 * The method is_solved() will return
 *      -1 in case none of the players has won and there are still empty fields so the game can continue
 *       0 in case the game ends in a draw, so no empty fields but none of the players has won
 *       1 in case player X has won
 *       2 in case player O has won
 *
 *  In a game of Tic-Tac-Toe, there are only 8 winning configurations:
 *  One player has secured all 3 fields horizontally (3x), vertically (3x) or diagonally (2x).
 *  These winning configurations are checked, and if there is a winner, the winner is returned.
 *  If there is no winner, the game may continue in case there are empty fields left.
 */
final class DataDrivenSolution
{

    public function is_solved(array $board): int
    {
        $winningConfigurations = [
            // horizontally
            [$board[0][0], $board[0][1], $board[0][2]],
            [$board[1][0], $board[1][1], $board[1][2]],
            [$board[2][0], $board[2][1], $board[2][2]],

            // vertically
            [$board[0][0], $board[1][0], $board[2][0]],
            [$board[0][1], $board[1][1], $board[2][1]],
            [$board[0][2], $board[1][2], $board[2][2]],

            // diagonally
            [$board[0][0], $board[1][1], $board[2][2]],
            [$board[0][2], $board[1][1], $board[2][0]],
        ];

        // check if a player has won
        foreach ($winningConfigurations as $gameConfiguration) {
            if ($this->isWon($gameConfiguration)) {
                return $gameConfiguration[0];
            }
        }

        // none of the players has one, check if the game is over
        return $this->hasEmptyFields($board)
            ? -1
            : 0;
    }

    /**
     * Checks if the game is won.
     * This only happens if
     *      1. all the fields have the same value and
     *      2. the fields are not empty
     */
    private function isWon(array $fields): bool
    {
        return $fields[0] !== 0 && count(array_flip($fields)) === 1;
    }

    /**
     * Checks if there are still empty fields so the game can continue.
     */
    private function hasEmptyFields(array $board): bool
    {
        return array_reduce(
            $board,
            static function ($carry, $row): bool {
                return $carry || in_array(0, $row, true);
            },
            false
        );
    }
}
