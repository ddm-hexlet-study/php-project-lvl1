<?php

namespace Brain\Games\Prime;

use function cli\line;
use function cli\prompt;
use function Brain\Games\FuncLib\getAnswer;
use function Brain\Games\FuncLib\checkAnswerStr;

function isPrime()
{
    $lowLimit = 1;
    $upLimit = 100;
    $number = random_int($lowLimit, $upLimit);
    line('Question: %s', $number);
    $isNumberPrime = true;
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i === 0) {
            $isNumberPrime = false;
        }
    }
    $answer = getAnswer();
    if ($answer !== 'yes' && $answer !== 'no') {
        $correctAnswerType = 0;
    } else {
        $correctAnswerType = 1;
    }
    $controlAnswer = ($isNumberPrime === true) ? 'yes' : 'no';
    return checkAnswerStr($answer, $controlAnswer);
}
