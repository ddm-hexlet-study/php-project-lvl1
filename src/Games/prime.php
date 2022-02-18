<?php

namespace Brain\Games\Prime;

use function cli\line;
use function cli\prompt;
use function Brain\Games\FuncLib\getAnswer;
use function Brain\Games\FuncLib\checkAnswer;

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
    $controlAnswer = ($isNumberPrime === true) ? 'yes' : 'no';
    $answer = getAnswer();
    if ($answer === $controlAnswer) {
        $result['check'] = 'true';
    } else {
        $result['check'] = 'false';
        $result['answer'] = $answer;
        $result['control'] = $controlAnswer;
    }
    return checkAnswer($answer, $controlAnswer);
}
