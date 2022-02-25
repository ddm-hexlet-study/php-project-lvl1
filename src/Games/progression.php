<?php

namespace Brain\Games\Progression;

use Brain\Games\Engine;

function generateDataProgression()
{
    $numberOfGames = 3;
    $result = [];
    $lowLimit = 1;
    $upLimit = 10;
    $progressionLength = 10;
    $progressionArr = [];
    $randomOffset = random_int($lowLimit, $upLimit);
    $step = random_int($lowLimit, $upLimit);
    for ($j = 0, $k = $randomOffset; $j < $progressionLength; $j++, $k += $step) {
        $progressionArr[] = $k;
    }
    $controlIndex = array_rand($progressionArr);
    $result['controlAnswer'] = $progressionArr[$controlIndex];
    $progressionArr[$controlIndex] = "..";
    $progressionStr = implode(' ', $progressionArr);
    $result['question'] = "Question: {$progressionStr}";
    return $result;
}
function startProgression()
{
    $description = 'What number is missing in the progression?';
    for ($i = 0; $i < Engine\NUMBER_OF_ROUNDS; $i++) {
        $data[$i] = generateDataProgression();
    }
    Engine\startGame($description, $data);
    return;
}
