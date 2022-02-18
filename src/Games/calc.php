<?php

namespace Brain\Games\Calc;

use function cli\line;
use function cli\prompt;
use function Brain\Games\FuncLib\getAnswer;
use function Brain\Games\FuncLib\checkAnswer;

function calculator()
{
    $lowLimit = 1;
    $upLimit = 20;
    $signArr = ['+', '-', '*'];
    $num1 = random_int($lowLimit, $upLimit);
    $num2 = random_int($lowLimit, $upLimit);
    $sign = $signArr[array_rand($signArr)];
    $expression = "{$num1} {$sign} {$num2}";
    line('Question: %s', $expression);
    $answer = (int) getAnswer();
    switch ($sign) {
        case '+':
            $controlAnswer = $num1 + $num2;
            break;
        case '-':
            $controlAnswer = $num1 - $num2;
            break;
        case '*':
            $controlAnswer = $num1 * $num2;
            break;
        default:
            $controlAnswer = $answer - 1;
    }
    return checkAnswer($answer, $controlAnswer);
}
