<?php

namespace Brain\Games\FuncLib;

use function cli\line;
use function cli\prompt;

function greeting(): string
{
        line('Welcome to the Brain Games!');
        $name = prompt('May I have your name?');
        line("Hello, %s!", $name);
        return $name;
}
function printTask(string $gameName)
{
    if ($gameName === 'calc') {
        line('What is the result of the expression?');
    } elseif ($gameName === 'gcd') {
        line('Find the greatest common divisor of given numbers.');
    } elseif ($gameName === 'even') {
        line('Answer "yes" if the number is even, otherwise answer "no".');
    } elseif ($gameName === 'prime') {
        line('Answer "yes" if given number is prime. Otherwise answer "no".');
    } elseif ($gameName === 'progression') {
        line('What number is missing in the progression?');
    }
}
function getAnswer()
{
    $invitation = 'Your answer';
    return prompt($invitation);
}
function checkAnswer($answer, $controlAnswer)
{
    $result = [];
    if ($answer === $controlAnswer) {
        $result['check'] = 'true';
    } else {
        $result['check'] = 'false';
        $result['answer'] = $answer;
        $result['control'] = $controlAnswer;
    }
    return $result;
}
