<?php

namespace BrainGames\Games\Even;

use BrainGames\Engine;

const NUMBER_OF_CYCLES = 3;
const TASK_MESSAGE = 'Answer "yes" if the number is even, otherwise answer "no".';
const NUMBER_INTERVAL = [1, 99];

function run(): void
{
    $tasks = [];
    for ($i = 0; $i < NUMBER_OF_CYCLES; $i++) {
        $number = rand(NUMBER_INTERVAL[0], NUMBER_INTERVAL[1]);
        $correctAnswer = isEven($number) ? "yes" : "no";
        $tasks[] = [
            'question' => $number,
            'correctAnswer' => $correctAnswer
        ];
    }
    Engine\runGame($tasks, TASK_MESSAGE, NUMBER_OF_CYCLES);
}

function isEven(int $number): bool
{
    return ($number & 1) === 0;
}
