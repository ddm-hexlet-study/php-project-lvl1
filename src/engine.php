<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function greeting(): string
{
        line('Welcome to the Brain Games!');
        $name = prompt('May I have your name?');
        line("Hello, %s!", $name);
        return $name;
}
function printTask(string $question)
{
    line('%s', $question);
}
function getAnswer()
{
    $invitation = 'Your answer';
    return prompt($invitation);
}
function checkAnswer($answer, $controlAnswer, $name)
{
    if ($answer === $controlAnswer) {
        line('Correct!');
        return true;
    } else {
        line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'.', $answer, $controlAnswer);
        line('Let\'s try again, %s!', $name);
        return false;
    }
}
