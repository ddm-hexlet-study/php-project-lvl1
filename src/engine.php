<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;
use function Brain\Games\FuncLib\greeting;
use function Brain\Games\FuncLib\printTask;
use function Brain\Games\Calc\calculator;
use function Brain\Games\Gcd\gcdCalc;
use function Brain\Games\Even\findParity;
use function Brain\Games\Prime\isPrime;
use function Brain\Games\Progression\findMissing;

function startGame(string $gameName = '')
{
    $name = greeting();
    printTask($gameName);
    $result = [];
    for ($i = 0; $i < 3; $i++) {
        if ($gameName === 'calc') {
            $result = calculator();
        } elseif ($gameName === 'gcd') {
            $result = gcdCalc();
        } elseif ($gameName === 'even') {
            $result = findParity();
        } elseif ($gameName === 'prime') {
            $result = isPrime();
        } elseif ($gameName === 'progression') {
            $result = findMissing();
        } else {
            return;
        }
        if ($result['check'] === 'true') {
            line('Correct!');
        } else {
            line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'.', $result['answer'], $result['control']);
            line('Let\'s try again, %s!', $name);
            return;
        }
    }
    line('Congratulations, %s!', $name);
}
