<?php

namespace Brain\Games\Even;

use Brain\Games\Engine;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

/**
 * Checks the parity of a number and returns bool.
 *
 * @param Int $num Number to check
 * @return Bool Result of the check
 */
function isEven(int $num): bool
{
    return $num % 2 === 0;
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
    $num = random_int($lowLimit, $upLimit);
    $num = random_int($lowLimit, $upLimit);
    $result['question'] = $num;
    $result['correctAnswer'] = isEven($num) ? 'yes' : 'no';
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
