<?php

namespace Brain\Games\Gcd;

use function Brain\Games\Engine\startGame;

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
        $limit = $num1 >= $num2 ? $num2 : $num1;
        $result[$i]['controlAnswer'] = 1;
        for ($j = 1; $j <= $limit; $j++) {
            if (($num1 % $j === 0) && ($num2 % $j === 0)) {
                $result[$i]['controlAnswer'] = $j;
            }
        }
    }
    return $result;
}
function startGameGcd()
{
    $description = 'Find the greatest common divisor of given numbers.';
    $data = generateDataGcd();
    startGame($description, $data);
    return;
}
