<?php

namespace Brain\Games\Progression;

use function cli\line;
use function cli\prompt;
use function Brain\Games\FuncLib\getAnswer;
use function Brain\Games\FuncLib\checkAnswer;

function findMissing()
{
    $lowLimit = 1;
    $upLimit = 10;
    $progressionArr = [];
    $randomOffset = random_int($lowLimit, $upLimit);
    $step = random_int($lowLimit, $upLimit);
    for ($i = 0, $k = $randomOffset; $i < 10; $i++, $k += $step) {
        $progressionArr[] = $k;
    }
    $controlIndex = array_rand($progressionArr);
    $controlAnswer = $progressionArr[$controlIndex];
    $progressionArr[$controlIndex] = "..";
    $progressionStr = implode(' ', $progressionArr);
    line('Question: %s', $progressionStr);
    $answer = (int) getAnswer();
    return checkAnswer($answer, $controlAnswer);
}
