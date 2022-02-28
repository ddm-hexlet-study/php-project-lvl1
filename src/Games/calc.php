<?php

namespace Brain\Games\Calc;

use Brain\Games\Engine;

const DESCRIPTION = 'What is the result of the expression?';

/**
 * Makes a calculation between two numbers.
 *
 * @param Int $num1 First number
 * @param Int $num2 Second number
 * @param String $sign Second number
 * @return Int Result of calculation
 */
function makeCalculation(int $num1, int $num2, string $sign): int
{
    $result = match ($sign) {
        '+' => $num1 + $num2,
        '-' => $num1 - $num2,
        '*' => $num1 * $num2,
        default => throw new \Exception('Unexpected sign.'),
    };
    return $result;
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
    $upLimit = 20;
    $signs = ['+', '-', '*'];
    $num1 = random_int($lowLimit, $upLimit);
    $num2 = random_int($lowLimit, $upLimit);
    $sign = $signs[array_rand($signs)];
    $result['question'] = "Question: {$num1} {$sign} {$num2}";
    try {
        $result['correctAnswer'] = makeCalculation($num1, $num2, $sign);
    } catch (\Exception $e) {
        echo "Exception thrown: " . $e->getMessage() . "\n";
        die();
    }
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
