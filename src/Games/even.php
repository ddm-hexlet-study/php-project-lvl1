<?php

namespace Brain\Games\Even;

use Brain\Games\Engine;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

/**
 * Checks the parity of a number and returns bool.
 *
 * @param Int $num1 Number to check
 * @return Bool Result of the check
 */
function isEven(int $num)
{
    return $num % 2 === 0;
}

function generateData()
{
    $result = [];
    $lowLimit = 1;
    $upLimit = 100;
    $num = random_int($lowLimit, $upLimit);
    $num = random_int($lowLimit, $upLimit);
    $result['question'] = "Question: {$num}";
    $result['correctAnswer'] = isEven($num) ? 'yes' : 'no';
    return $result;
}

function start()
{
    $data = [];
    for ($i = 0; $i < Engine\NUMBER_OF_ROUNDS; $i++) {
        $data[$i] = generateData();
    }
    Engine\startGame(DESCRIPTION, $data);
    return;
}
