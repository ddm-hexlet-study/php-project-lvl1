<?php

namespace Brain\Games\Progression;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\greeting;
use function Brain\Games\Engine\printTask;
use function Brain\Games\Engine\getAnswer;
use function Brain\Games\Engine\checkAnswer;

const TASK = 'What number is missing in the progression?';
function findMissing($name)
{
    $lowLimit = 1;
    $upLimit = 10;
    for ($j = 0; $j < 3; $j++) {
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
        $result = checkAnswer($answer, $controlAnswer, $name);
        if ($result === false) {
            return $result;
        }
    }
    return $result;
}
function startGameProgression()
{
    $name = greeting();
    printTask(TASK);
    $result = findMissing($name);
    if ($result === true) {
        line('Congratulations, %s', $name);
    }
}
