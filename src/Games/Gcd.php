<?php

namespace BrainGames\Games\Gcd;

use function cli\line;

function run()
{
    line("Find the greatest common divisor of given numbers.");
    $a = rand(1, 10) * rand(1, 10);
    $b = rand(1, 10) * rand(1, 10);
    $question = "$a $b";
    $correctAnswer = getGcd($a, $b);
    $result = [
        'question' => $question,
        'correctAnswer' => $correctAnswer
    ];
    return $result;
}

function getGcd(int $a, int $b)
{
    $gcd = 1;
    $min = min($a, $b);
    for ($i = 1; $i <= $min; $i++) {
        $a % $i === 0 && $b % $i === 0 ? $gcd = $i : null;
    }
    return $gcd;
}
