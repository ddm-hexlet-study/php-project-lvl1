<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const NUMBER_OF_ROUNDS = 3;

function startGame(string $description, array $data)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('%s', $description);
    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        $question = $data[$i]['question'];
        $controlAnswer = $data[$i]['controlAnswer'];
        line("%s", $question);
        $answer = prompt('Your answer');
        if ($answer != $controlAnswer) {
            line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'.', $answer, $controlAnswer);
            line('Let\'s try again, %s!', $name);
            return;
        }
        line('Correct!');
    }
    line('Congratulations, %s!', $name);
    return;
}
