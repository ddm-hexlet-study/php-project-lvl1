<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const NUMBER_OF_ROUNDS = 3;

/**
 * The engine, that starts any game.
 * @param String $description Description of the game
 * @param Array $data Array of questions and correct answers
 */
function playGame(string $description, array $data): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
    line('%s', $description);
    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        ['question' => $question, 'correctAnswer' => $correctAnswer] = $data[$i];
        line("Question: %s", $question);
        $answer = prompt('Your answer');
        if ($answer != $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!", $name);
            return;
        }
        line('Correct!');
    }
    line('Congratulations, %s!', $name);
}
