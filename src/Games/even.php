<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;
use function Brain\Games\FuncLib\getAnswer;
use function Brain\Games\FuncLib\checkAnswer;

function findParity()
{
    $result = [];
    $lowLimit = 1;
    $upLimit = 100;
    $num = random_int($lowLimit, $upLimit);
    line('Question: %s', $num);
    $answer = getAnswer();
    $controlAnswer = ($num % 2 === 0) ? 'yes' : 'no';
    return checkAnswer($answer, $controlAnswer);
}
