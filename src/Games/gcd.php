<?php

namespace Brain\Games\Gcd;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\greeting;
use function Brain\Games\Engine\printTask;
use function Brain\Games\Engine\getAnswer;
use function Brain\Games\Engine\checkAnswer;

const TASK = 'Find the greatest common divisor of given numbers.';
function gcdCalc(string $name)
{
    $lowLimit = 1;
    $upLimit = 100;
    for ($j = 0; $j < 3; $j++) {
        $num1 = random_int($lowLimit, $upLimit);
        $num2 = random_int($lowLimit, $upLimit);
        line('Question: %s %s', $num1, $num2);
        $answer = (int) getAnswer();
        $limit = $num1 >= $num2 ? $num2 : $num1;
        $controlAnswer = 1;
        for ($i = 1; $i <= $limit; $i++) {
            if (($num1 % $i === 0) && ($num2 % $i === 0)) {
                $controlAnswer = $i;
            }
        }
        $result = checkAnswer($answer, $controlAnswer, $name);
        if ($result === false) {
            return $result;
        }
    }
    return $result ?? false;
}
function startGameGcd()
{
    $name = greeting();
    printTask(TASK);
    $result = gcdCalc($name);
    if ($result === true) {
        line('Congratulations, %s!', $name);
    }
}
