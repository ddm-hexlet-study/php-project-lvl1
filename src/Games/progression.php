<?php

namespace Brain\Games\Progression;

use Brain\Games\Engine;

const DESCRIPTION = 'What number is missing in the progression?';

/**
 * Creates digit progression.
 *
 * @param Int $firstNumber First item of the progression
 * @param Int $step Difference between neighboring items
 * @param Int $progressionLength Length of the progression
 * @return Array Progression
 */
function createProgression(int $firstNumber, int $step, int $progressionLength): array
{
    $progression = [];
    for ($j = 0, $k = $firstNumber; $j < $progressionLength; $j++, $k += $step) {
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
    $lowLimit = 1;
    $upLimit = 10;
    $progressionLength = 10;
    $firstNumber = random_int($lowLimit, $upLimit);
    $step = random_int($lowLimit, $upLimit);
    $result = [];
    $progression = createProgression($firstNumber, $step, $progressionLength);
    $controlIndex = array_rand($progression);
    $result['correctAnswer'] = $progression[$controlIndex];
    $progression[$controlIndex] = "..";
    $progressionStr = implode(' ', $progression);
    $result['question'] = $progressionStr;
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
    Engine\playGame(DESCRIPTION, $data);
}
