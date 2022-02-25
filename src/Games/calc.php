<?php

namespace Brain\Games\Calc;

use Brain\Games\Engine;

function makeCalculation(int $num1, int $num2, string $sign)
{
    $result = 0;
    switch ($sign) {
        case '+':
            $result = $num1 + $num2;
            break;
        case '-':
            $result = $num1 - $num2;
            break;
        case '*':
            $result = $num1 * $num2;
            break;
    }
    return $result;
}
function generateDataCalc()
{
    $result = [];
    $lowLimit = 1;
    $upLimit = 20;
    $signArr = ['+', '-', '*'];
    $num1 = random_int($lowLimit, $upLimit);
    $num2 = random_int($lowLimit, $upLimit);
    $sign = $signArr[array_rand($signArr)];
    $result['question'] = "Question: {$num1} {$sign} {$num2}";
    $result['controlAnswer'] = makeCalculation($num1, $num2, $sign);
    return $result;
}
function startCalc()
{
    $description = 'What is the result of the expression?';
    for ($i = 0; $i < Engine\NUMBER_OF_ROUNDS; $i++) {
        $data[$i] = generateDataCalc();
    }
    Engine\startGame($description, $data);
    return;
}
