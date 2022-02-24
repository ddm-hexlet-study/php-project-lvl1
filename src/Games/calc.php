<?php

namespace Brain\Games\Calc;

use function Brain\Games\Engine\startGame;

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
    $numberOfGames = 3;
    $result = [];
    $lowLimit = 1;
    $upLimit = 20;
    $signArr = ['+', '-', '*'];
    for ($i = 0; $i < $numberOfGames; $i++) {
        $num1 = random_int($lowLimit, $upLimit);
        $num2 = random_int($lowLimit, $upLimit);
        $sign = $signArr[array_rand($signArr)];
        $result[$i]['question'] = "Question: {$num1} {$sign} {$num2}";
        $result[$i]['controlAnswer'] = makeCalculation($num1, $num2, $sign);
    }
    return $result;
}
function startCalc()
{
    $description = 'What is the result of the expression?';
    $data = generateDataCalc();
    startGame($description, $data);
    return;
}
