<?php

namespace Brain\Games\Parity;

use function cli\line;
use function cli\prompt;

function greeting()
{
        line('Welcome to the Brain Games!');
        $name = prompt('May I have your name?');
        line("Hello, %s!", $name);
        return $name;
}

function findParity($name)
{
    $lowLimit = 1;
    $upLimit = 100;
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 0; $i < 3; $i++) {
        $num = random_int($lowLimit, $upLimit);
        line('Question: %s', $num);
        $answer = prompt('Your answer');
        $controlAnswer = ($num % 2 === 0) ? 'yes' : 'no';
        if ($answer === $controlAnswer) {
            line('Correct!');
        } else {
            line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'.', $answer, $controlAnswer);
            line('Let\'s try again, %s!', $name);
            return;
        }
    }
    line('Congratulations, %s', $name);
}
