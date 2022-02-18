<?php

namespace Brain\Games\Gcd;

use function cli\line;
use function cli\prompt;
use function Brain\Games\FuncLib\getAnswer;
use function Brain\Games\FuncLib\checkAnswer;

function gcdCalc()
{
    $lowLimit = 1;
    $upLimit = 100;
    $num1 = random_int($lowLimit, $upLimit);
    $num2 = random_int($lowLimit, $upLimit);
    line('Question: %s %s', $num1, $num2);
    $answer = (int) getAnswer();
    $limit = $num1 >= $num2 ? $num2 : $num1;
    $controlAnswer = 1;
    for ($i = 1; $i <= $limit; $i++) {
        if (($num1 % $i === 0) && ($num2 % $i === 0)) {
            $controlAnswer = $i;
        }
    }
    return checkAnswer($answer, $controlAnswer);
}
