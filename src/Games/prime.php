<?php

namespace Brain\Games\Prime;

use function Brain\Games\Engine\startGame;

function generateDataPrime()
{
    $numberOfGames = 3;
    $result = [];
    $lowLimit = 1;
    $upLimit = 100;
    $num = random_int($lowLimit, $upLimit);
    for ($i = 0; $i < $numberOfGames; $i++) {
        $num = random_int($lowLimit, $upLimit);
        $isNumberPrime = true;
        for ($j = 2; $j < $num; $j++) {
            if ($num % $j === 0) {
                $isNumberPrime = false;
            }
        }
        $result[$i]['question'] = "Question: {$num}";
        $result[$i]['controlAnswer'] = ($isNumberPrime === true) ? 'yes' : 'no';
    }
    return $result;
}
function startGamePrime()
{
    $description = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $data = generateDataPrime();
    startGame($description, $data);
    return;
}
