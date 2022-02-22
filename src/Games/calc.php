<?php

namespace Brain\Games\Calc;

use function Brain\Games\Engine\startGame;

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
        switch ($sign) {
            case '+':
                $result[$i]['controlAnswer'] = $num1 + $num2;
                break;
            case '-':
                $result[$i]['controlAnswer'] = $num1 - $num2;
                break;
            case '*':
                $result[$i]['controlAnswer'] = $num1 * $num2;
                break;
            default:
                $result[$i]['controlAnswer'] = $answer - 1;
        }
    }
    return $result;
}
function startGameCalc()
{
    $description = 'What is the result of the expression?';
    $data = generateDataCalc();
    startGame($description, $data);
    return;
}
