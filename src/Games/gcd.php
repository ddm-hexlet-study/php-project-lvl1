<?php

namespace Brain\Games\Gcd;

use function Brain\Games\Engine\startGame;

function findGcd(int $num1, int $num2)
{
    $result = 1;
    $limit = $num1 >= $num2 ? $num2 : $num1;
    for ($i = 1; $i <= $limit; $i++) {
        if (($num1 % $i === 0) && ($num2 % $i === 0)) {
            $result = $i;
        }
    }
    return $result;
}
function generateDataGcd()
{
    $numberOfGames = 3;
    $result = [];
    $lowLimit = 1;
    $upLimit = 100;
    for ($i = 0; $i < $numberOfGames; $i++) {
        $num1 = random_int($lowLimit, $upLimit);
        $num2 = random_int($lowLimit, $upLimit);
        $result[$i]['question'] = "Question: {$num1} {$num2}";
        $result[$i]['controlAnswer'] = findGcd($num1, $num2);
    }
    return $result;
}
function startGcd()
{
    $description = 'Find the greatest common divisor of given numbers.';
    $data = generateDataGcd();
    startGame($description, $data);
    return;
}
