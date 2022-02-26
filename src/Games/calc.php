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
function makeCalculation(int $num1, int $num2, string $sign)
{
    $result = match ($sign) {
        '+' => $num1 + $num2,
        '-' => $num1 - $num2,
        '*' => $num1 * $num2,
        default => $num1,
    };
    return $result;
}

function generateData()
{
    $result = [];
    $lowLimit = 1;
    $upLimit = 20;
    $signs = ['+', '-', '*'];
    $num1 = random_int($lowLimit, $upLimit);
    $num2 = random_int($lowLimit, $upLimit);
    $sign = $signs[array_rand($signs)];
    $result['question'] = "Question: {$num1} {$sign} {$num2}";
    $result['correctAnswer'] = makeCalculation($num1, $num2, $sign);
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
