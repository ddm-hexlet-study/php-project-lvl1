<?php

namespace Brain\Games\Prime;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\greeting;
use function Brain\Games\Engine\printTask;
use function Brain\Games\Engine\getAnswer;
use function Brain\Games\Engine\checkAnswer;

const TASK = 'Answer "yes" if given number is prime. Otherwise answer "no".';
function isPrime($name)
{
    $lowLimit = 1;
    $upLimit = 100;
    for ($j = 0; $j < 3; $j++) {
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
        $result = checkAnswer($answer, $controlAnswer, $name);
        if ($result === false) {
            return $result;
        }
    }
    return $result;
}
function startGamePrime()
{
    $name = greeting();
    printTask(TASK);
    $result = isPrime($name);
    if ($result === true) {
        line('Congratulations, %s', $name);
    }
}
