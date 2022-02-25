<?php

namespace Brain\Games\Even;

use Brain\Games\Engine;

function isEven(int $num)
{
    return $num % 2 === 0;
}
function generateDataEven()
{
    $result = [];
    $lowLimit = 1;
    $upLimit = 100;
    $num = random_int($lowLimit, $upLimit);
    $num = random_int($lowLimit, $upLimit);
    $result['question'] = "Question: {$num}";
    $result['controlAnswer'] = isEven($num) ? 'yes' : 'no';
    return $result;
}
function startEven()
{
    $description = 'Answer "yes" if the number is even, otherwise answer "no".';
    for ($i = 0; $i < Engine\NUMBER_OF_ROUNDS; $i++) {
        $data[$i] = generateDataEven();
    }
    Engine\startGame($description, $data);
    return;
}
