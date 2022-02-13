<?php

namespace Brain\Games\Calc;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\greeting;
use function Brain\Games\Engine\printTask;
use function Brain\Games\Engine\getAnswer;
use function Brain\Games\Engine\checkAnswer;

const TASK = 'What is the result of the expression?';
function calculate(string $name)
{
    $lowLimit = 1;
    $upLimit = 20;
    $signArr = ['+', '-', '*'];
    for ($i = 0; $i < 3; $i++) {
        $num1 = random_int($lowLimit, $upLimit);
        $num2 = random_int($lowLimit, $upLimit);
        $sign = $signArr[array_rand($signArr)];
        $expression = "{$num1} {$sign} {$num2}";
        line('Question: %s', $expression);
        $answer = (int) getAnswer();
        switch ($sign) {
            case '+':
                $controlAnswer = $num1 + $num2;
                break;
            case '-':
                $controlAnswer = $num1 - $num2;
                break;
            case '*':
                $controlAnswer = $num1 * $num2;
                break;
        }
        $result = checkAnswer($answer, $controlAnswer, $name);
        if ($result === false) {
            return $result;
        }
    }
    return $result ?? false;
}
function startGameCalc()
{
    $name = greeting();
    printTask(TASK);
    $result = calculate($name);
    if ($result === true) {
        line('Congratulations, %s!', $name);
    }
}
