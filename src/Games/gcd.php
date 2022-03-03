<?php

namespace Brain\Games\Gcd;

use Brain\Games\Engine;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

/**
 * Finds the greatest common divisor of two numbers.
 *
 * @param Int $num1 First number
 * @param Int $num2 Second number
 * @return Int Greatest common divisor
 */
function findGcd(int $num1, int $num2): int
{
    while ($num1 !== $num2) {
        if ($num1 > $num2) {
            $num1 = $num1 - $num2;
        } else {
            $num2 = $num2 - $num1;
        }
    }
    return $num1;
}

/**
 * Generates array of questions and correct answers.
 *
 * @return Array Result of generating
 */
function generateData(): array
{
    $result = [];
    $lowLimit = 1;
    $upLimit = 100;
    $num1 = random_int($lowLimit, $upLimit);
    $num2 = random_int($lowLimit, $upLimit);
    $result['question'] = "{$num1} {$num2}";
    $result['correctAnswer'] = findGcd($num1, $num2);
    return $result;
}

/**
 * Starts game.
 */
function start(): void
{
    $data = [];
    for ($i = 0; $i < Engine\NUMBER_OF_ROUNDS; $i++) {
        $data[$i] = generateData();
    }
    Engine\playGame(DESCRIPTION, $data);
}
