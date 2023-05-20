<?php

declare(strict_types=1);

namespace Kata\RomanNumeralsDecoder;

/**
 * Decodes a given roman numeral like 'IX' to a decimal integer.
 * This is done by
 * - splitting the string in an array of 1 byte characters
 * - iterating over the array mapping the roman character to its decimal value
 * - deciding if this value is added or subtracted from the carry by looking at the last value
 *
 * The input string is reversed (decoding the roman numeral from right to left), so $lastValue is initialized with zero.
 * There is only 1 way a valid subtraction can happen: The $lastValue is greater than the current one. This may only happen once.
 */
final class StringSplitSolution
{
    public function solution(string $roman): int
    {
        $codeMap = [
            'I' => 1,
            'V' => 5,
            'X' => 10,
            'L' => 50,
            'C' => 100,
            'D' => 500,
            'M' => 1000,
        ];

        $lastValue = 0;
        return array_reduce(
            str_split(strrev($roman)) ?: [],
            static function ($carry, $romanSymbol) use ($codeMap, &$lastValue) {
                $currentValue = $codeMap[$romanSymbol];
                $carry += ($currentValue >= $lastValue)
                    ? $currentValue
                    : -$currentValue;
                $lastValue = $currentValue;
                return $carry;
        });
    }
}
