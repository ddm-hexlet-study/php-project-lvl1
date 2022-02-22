<?php

namespace Brain\Games\Progression;

use function Brain\Games\Engine\startGame;

function generateDataProgression()
{
    $numberOfGames = 3;
    $result = [];
    $lowLimit = 1;
    $upLimit = 10;
    $progressionLength = 10;
    for ($i = 0; $i < $numberOfGames; $i++) {
        $progressionArr = [];
        $randomOffset = random_int($lowLimit, $upLimit);
        $step = random_int($lowLimit, $upLimit);
        for ($j = 0, $k = $randomOffset; $j < $progressionLength; $j++, $k += $step) {
            $progressionArr[] = $k;
        }
        $controlIndex = array_rand($progressionArr);
        $result[$i]['controlAnswer'] = $progressionArr[$controlIndex];
        $progressionArr[$controlIndex] = "..";
        $progressionStr = implode(' ', $progressionArr);
        $result[$i]['question'] = "Question: {$progressionStr}";
    }
    return $result;
}
function startGameProgression()
{
    $description = 'AnswWhat number is missing in the progression?';
    $data = generateDataProgression();
    startGame($description, $data);
    return;
}
