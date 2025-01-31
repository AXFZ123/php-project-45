<?php

namespace BrainGames\Games\Even;

use function cli\line;

function run() {
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $number = rand(1, 99);
    $correctAnswer = ['yes', 'no'][$number & 1];
    $result = [
        'question' => $number,
        'correctAnswer' => $correctAnswer
    ];
    return $result;
}
