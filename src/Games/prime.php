<?php

namespace Brain\Games\Prime;

use function Brain\Games\Engine\startGame;

function isPrime(int $num)
{
    $isNumberPrime = true;
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i === 0) {
            $isNumberPrime = false;
        }
    }
    return $isNumberPrime;
}
function generateDataPrime()
{
    $numberOfGames = 3;
    $result = [];
    $lowLimit = 1;
    $upLimit = 100;
    $num = random_int($lowLimit, $upLimit);
    for ($i = 0; $i < $numberOfGames; $i++) {
        $num = random_int($lowLimit, $upLimit);
        $result[$i]['question'] = "Question: {$num}";
        $result[$i]['controlAnswer'] = isPrime($num) ? 'yes' : 'no';
    }
    return $result;
}
function startPrime()
{
    $description = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $data = generateDataPrime();
    startGame($description, $data);
    return;
}
