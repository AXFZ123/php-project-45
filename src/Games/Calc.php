<?php

namespace BrainGames\Games\Calc;

use function cli\line;

function run()
{
    line("What is the result of the expression?");
    $operand = ['-', '+', '*'][rand(0, 2)];
    $a = rand(1, 99);
    $b = $operand === '*' ? rand(2, 9) : rand(1, 99);
    $question = "$a $operand $b";
    $correctAnswer = match ($operand) {
        '-' => $a - $b,
        '+' => $a + $b,
        '*' => $a * $b
    };
    $result = [
        'question' => $question,
        'correctAnswer' => $correctAnswer
    ];
    return $result;
}
