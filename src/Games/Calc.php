<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\runGame;

const NUMBER_OF_CYCLES = 3;
const TASK_MESSAGE = "What is the result of the expression?";
const OPERATORS = ['-', '+', '*'];
const INTERVAL = [1, 99];
const MULTI_INTERVAL = [2, 9];

function run(): void
{
    $tasks = [];
    for ($i = 0; $i < NUMBER_OF_CYCLES; $i++) {
        $operator = OPERATORS[rand(1, count(OPERATORS)) - 1];
        $a = rand(INTERVAL[0], INTERVAL[1]);
        $b = $operator === '*' ? rand(MULTI_INTERVAL[0], MULTI_INTERVAL[1]) : rand(INTERVAL[0], INTERVAL[1]);
        $question = "$a $operator $b";
        $correctAnswer = calculate($a, $b, $operator);
        $tasks[] = [
            'question' => $question,
            'correctAnswer' => $correctAnswer
        ];
    }
    runGame($tasks, TASK_MESSAGE);
}

function calculate(int $a, int $b, string $operator): int
{
    $result = match ($operator) {
        '-' => $a - $b,
        '+' => $a + $b,
        '*' => $a * $b,
        default => throw new \Exception('Undefined operator')
    };
    return $result;
}
