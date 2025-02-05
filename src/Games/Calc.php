<?php

namespace BrainGames\Games\Calc;

use BrainGames\Engine;

const NUMBER_OF_CYCLES = 3;
const TASK_MESSAGE = "What is the result of the expression?";
const OPERANDS = ['-', '+', '*'];
const OPERATOR_INTERVAL = [1, 99];
const MULTIPLICATION_SECOND_OPERATOR_INTERVAL = [2, 9];

function run(): void
{
    $tasks = [];
    for ($i = 0; $i < NUMBER_OF_CYCLES; $i++) {
        $operand = OPERANDS[rand(1, count(OPERANDS)) - 1];
        $a = rand(OPERATOR_INTERVAL[0], OPERATOR_INTERVAL[1]);
        $b = $operand === '*' ? rand(MULTIPLICATION_SECOND_OPERATOR_INTERVAL[0], 
        MULTIPLICATION_SECOND_OPERATOR_INTERVAL[1]) : rand(OPERATOR_INTERVAL[0], OPERATOR_INTERVAL[1]);
        $question = "$a $operand $b";
        $correctAnswer = calculate($a, $b, $operand);
        $tasks[] = [
            'question' => $question,
            'correctAnswer' => $correctAnswer
        ];
    }
    Engine\runGame($tasks, TASK_MESSAGE, NUMBER_OF_CYCLES);
}

function calculate(int $a, int $b, string $operand): int
{
    $result = match ($operand) {
        '-' => $a - $b,
        '+' => $a + $b,
        '*' => $a * $b,
        default => throw new \Exception('Undefined operand')
    };
    return $result;
}