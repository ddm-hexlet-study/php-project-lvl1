<?php

namespace Brain\Games\Even;

use function Brain\Games\Engine\startGame;

function generateDataEven()
{
    $numberOfGames = 3;
    $result = [];
    $lowLimit = 1;
    $upLimit = 100;
    $num = random_int($lowLimit, $upLimit);
    for ($i = 0; $i < $numberOfGames; $i++) {
        $num = random_int($lowLimit, $upLimit);
        $result[$i]['question'] = "Question: {$num}";
        $result[$i]['controlAnswer'] = ($num % 2 === 0) ? 'yes' : 'no';
    }
    return $result;
}
function startGameEven()
{
    $description = 'Answer "yes" if the number is even, otherwise answer "no".';
    $data = generateDataEven();
    startGame($description, $data);
    return;
}
