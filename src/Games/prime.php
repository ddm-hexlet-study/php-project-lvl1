<?php

namespace Brain\Games\Prime;

use Brain\Games\Engine;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

/**
 * Checks if the given number is prime.
 *
 * @param Int $num Number to check
 * @return Bool Result of the check
 */
function isPrime(int $num): bool
{
    $isNumberPrime = true;
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i === 0) {
            $isNumberPrime = false;
        }
    }
    return $isNumberPrime;
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
    $result['question'] = "Question: {$num}";
    $result['correctAnswer'] = isPrime($num) ? 'yes' : 'no';
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
    Engine\startGame(DESCRIPTION, $data);
}
