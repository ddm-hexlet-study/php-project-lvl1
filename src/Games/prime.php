<?php

namespace Brain\Games\Prime;

use Brain\Games\Engine;

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
    $result = [];
    $lowLimit = 1;
    $upLimit = 100;
    $num = random_int($lowLimit, $upLimit);
    $result['question'] = "Question: {$num}";
    $result['controlAnswer'] = isPrime($num) ? 'yes' : 'no';
    return $result;
}
function startPrime()
{
    $description = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    for ($i = 0; $i < Engine\NUMBER_OF_ROUNDS; $i++) {
        $data[$i] = generateDataPrime();
    }
    Engine\startGame($description, $data);
    return;
}
