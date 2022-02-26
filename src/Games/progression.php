<?php

namespace Brain\Games\Progression;

use Brain\Games\Engine;

const DESCRIPTION = 'What number is missing in the progression?';

function generateData()
{
    $numberOfGames = 3;
    $result = [];
    $lowLimit = 1;
    $upLimit = 10;
    $progressionLength = 10;
    $progression = [];
    $randomOffset = random_int($lowLimit, $upLimit);
    $step = random_int($lowLimit, $upLimit);
    for ($j = 0, $k = $randomOffset; $j < $progressionLength; $j++, $k += $step) {
        $progression[] = $k;
    }
    $controlIndex = array_rand($progression);
    $result['correctAnswer'] = $progression[$controlIndex];
    $progression[$controlIndex] = "..";
    $progressionStr = implode(' ', $progression);
    $result['question'] = "Question: {$progressionStr}";
    return $result;
}

function start()
{
    $data = [];
    for ($i = 0; $i < Engine\NUMBER_OF_ROUNDS; $i++) {
        $data[$i] = generateData();
    }
    Engine\startGame(DESCRIPTION, $data);
    return;
}
