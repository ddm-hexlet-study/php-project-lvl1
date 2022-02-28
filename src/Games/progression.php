<?php

namespace Brain\Games\Progression;

use Brain\Games\Engine;

const DESCRIPTION = 'What number is missing in the progression?';

/**
 * Creates digit progression.
 *
 * @param Int $progressionLength Length of the progression
 * @return Array Progression
 */
function createProgression(int $progressionLength): array
{
    $lowLimit = 1;
    $upLimit = 10;
    $progression = [];
    $randomOffset = random_int($lowLimit, $upLimit);
    $step = random_int($lowLimit, $upLimit);
    for ($j = 0, $k = $randomOffset; $j < $progressionLength; $j++, $k += $step) {
        $progression[] = $k;
    }
    return $progression;
}

/**
 * Generates array of questions and correct answers.
 *
 * @return Array Result of generating
 */
function generateData(): array
{
    $numberOfGames = 3;
    $progressionLength = 10;
    $result = [];
    $progression = createProgression($progressionLength);
    $controlIndex = array_rand($progression);
    $result['correctAnswer'] = $progression[$controlIndex];
    $progression[$controlIndex] = "..";
    $progressionStr = implode(' ', $progression);
    $result['question'] = "Question: {$progressionStr}";
    return $result;
}

/**
 * Starts game.
 */
function start(): void
{
    $data = [];
    for ($i = 0; $i < Engine\NUMBER_OF_ROUNDS; $i++) {
        $data[$i] = generateData();
    }
    Engine\startGame(DESCRIPTION, $data);
}
