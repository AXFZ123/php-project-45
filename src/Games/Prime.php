<?php

namespace BrainGames\Games\Prime;

use function cli\line;

function run()
{
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    $primeList = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97];
    if (rand(0, 1) === 0) {
        $question = $primeList[rand(1, count($primeList)) - 1];
        $correctAnswer = 'yes';
    } else {
        do {
            $question = rand(2, 99);
        } while (in_array($question, $primeList, true));
        $correctAnswer = 'no';
    }
    $result = [
        'question' => $question,
        'correctAnswer' => $correctAnswer
    ];
    return $result;
}
