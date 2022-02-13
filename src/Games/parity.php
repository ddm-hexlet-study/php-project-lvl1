<?php

namespace Brain\Games\Parity;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\greeting;
use function Brain\Games\Engine\printTask;
use function Brain\Games\Engine\getAnswer;
use function Brain\Games\Engine\checkAnswer;

const TASK = 'Answer "yes" if the number is even, otherwise answer "no".';
function findParity(string $name)
{
    $lowLimit = 1;
    $upLimit = 100;
    for ($i = 0; $i < 3; $i++) {
        $num = random_int($lowLimit, $upLimit);
        line('Question: %s', $num);
        $answer = getAnswer();
        if ($answer === 'yes') {
            $intAnswer = 1;
        }
        if ($answer === 'no') {
            $intAnswer = 0;
        }
        $controlAnswer = ($num % 2 === 0) ? '1' : '0';
        $result = checkAnswer($intAnswer, $controlAnswer, $name);
        if ($result === false) {
            return $result;
        }
    }
    return $result ?? false;
}
function startGamePatiry()
{
    $name = greeting();
    printTask(TASK);
    $result = findParity($name);
    if ($result === true) {
        line('Congratulations, %s!', $name);
    }
}
