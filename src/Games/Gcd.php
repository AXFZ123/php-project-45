<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\runGame;

const NUMBER_OF_CYCLES = 3;
const TASK_MESSAGE = 'Find the greatest common divisor of given numbers.';
const MAX_COEFFICIENT = 10;

function run(): void
{
    global $config;
    print_r($config);
    $tasks = [];
    for ($i = 0; $i < NUMBER_OF_CYCLES; $i++) {
        $a = rand(1, MAX_COEFFICIENT) * rand(1, MAX_COEFFICIENT);
        $b = rand(1, MAX_COEFFICIENT) * rand(1, MAX_COEFFICIENT);
        $question = "$a $b";
        $correctAnswer = getGcd($a, $b);
        $tasks[] = [
            'question' => $question,
            'correctAnswer' => $correctAnswer
        ];
    }
    runGame($tasks, TASK_MESSAGE, NUMBER_OF_CYCLES);
}

function getGcd(int $a, int $b): int
{
    if ($b === 0) {
        return abs($a);
    } else {
        return getGcd($b, $a % $b);
    }
}
