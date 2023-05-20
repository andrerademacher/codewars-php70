<?php

declare(strict_types=1);

namespace Kata\RomanNumeralsDecoder;

use Generator;
use PHPUnit\Framework\TestCase;

/**
 * Testing the "Roman numerals decoder kata". Refactoring is a thing!
 */
final class StringSplitSolutionTest extends TestCase
{
    /**
     * @dataProvider provide
     */
    public function testStringSplitSolution(int $expected, string $input)
    {
        self::assertSame($expected, (new StringSplitSolution())->solution($input));
    }

    public function provide(): Generator
    {
        yield '0' => [0, ''];
        yield '1' => [1, 'I'];
        yield '2' => [2, 'II'];
        yield '3' => [3, 'III'];
        yield '4' => [4, 'IV'];
        yield '5' => [5, 'V'];
        yield '6' => [6, 'VI'];
        yield '7' => [7, 'VII'];
        yield '8' => [8, 'VIII'];
        yield '9' => [9, 'IX'];
        yield '10' => [10, 'X'];
        yield '11' => [11, 'XI'];
        yield '12' => [12, 'XII'];
        yield '14' => [14, 'XIV'];
        yield '15' => [15, 'XV'];
        yield '16' => [16, 'XVI'];
        yield '18' => [18, 'XVIII'];
        yield '19' => [19, 'XIX'];
        yield '20' => [20, 'XX'];
        yield '21' => [21, 'XXI'];
        yield '22' => [22, 'XXII'];
        yield '24' => [24, 'XXIV'];
        yield '25' => [25, 'XXV'];
        yield '26' => [26, 'XXVI'];
        yield '28' => [28, 'XXVIII'];
        yield '29' => [29, 'XXIX'];
        yield '30' => [30, 'XXX'];
        yield '38' => [38, 'XXXVIII'];
        yield '39' => [39, 'XXXIX'];
        yield '40' => [40, 'XL'];
        yield '42' => [42, 'XLII'];
        yield '45' => [45, 'XLV'];
        yield '46' => [46, 'XLVI'];
        yield '48' => [48, 'XLVIII'];
        yield '49' => [49, 'XLIX'];
        yield '50' => [50, 'L'];
        yield '62' => [62, 'LXII'];
        yield '64' => [64, 'LXIV'];
        yield '68' => [68, 'LXVIII'];
        yield '69' => [69, 'LXIX'];
        yield '70' => [70, 'LXX'];
        yield '80' => [80, 'LXXX'];
        yield '84' => [84, 'LXXXIV'];
        yield '85' => [85, 'LXXXV'];
        yield '86' => [86, 'LXXXVI'];
        yield '87' => [87, 'LXXXVII'];
        yield '88' => [88, 'LXXXVIII'];
        yield '89' => [89, 'LXXXIX'];
        yield '90' => [90, 'XC'];
        yield '91' => [91, 'XCI'];
        yield '92' => [92, 'XCII'];
        yield '94' => [94, 'XCIV'];
        yield '95' => [95, 'XCV'];
        yield '96' => [96, 'XCVI'];
        yield '97' => [97, 'XCVII'];
        yield '98' => [98, 'XCVIII'];
        yield '99' => [99, 'IC'];
        yield '100' => [100, 'C'];
    }
}
