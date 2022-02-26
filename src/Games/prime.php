<?php

namespace Brain\Games\Prime;

use Brain\Games\Engine;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

/**
 * Checks if the given number is prime.
 *
 * @param Int $num1 Number to check
 * @return Bool Result of the check
 */
function isPrime(int $num)
{
    $isNumberPrime = true;
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i === 0) {
            $isNumberPrime = false;
        }
    }
    return $isNumberPrime;
}

function generateData()
{
    $result = [];
    $lowLimit = 1;
    $upLimit = 100;
    $num = random_int($lowLimit, $upLimit);
    $result['question'] = "Question: {$num}";
    $result['correctAnswer'] = isPrime($num) ? 'yes' : 'no';
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
