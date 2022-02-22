<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function startGame(string $description, array $data)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('%s', $description);
    foreach ($data as $key => $currentRoundData) {
        $question = $currentRoundData['question'];
        $controlAnswer = $currentRoundData['controlAnswer'];
        line("%s", $question);
        $answer = prompt('Your answer');
        if ($answer == $controlAnswer) {
            line('Correct!');
        } else {
            line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'.', $answer, $controlAnswer);
            line('Let\'s try again, %s!', $name);
            return;
        }
    }
    line('Congratulations, %s!', $name);
    return;
}
