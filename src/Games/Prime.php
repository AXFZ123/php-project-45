<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\runGame;

const NUMBER_OF_CYCLES = 3;
const TASK_MESSAGE = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const MAX_NUMBER = 99;

function run(): void
{
    $tasks = [];
    for ($i = 0; $i < NUMBER_OF_CYCLES; $i++) {
        $number = rand(1, MAX_NUMBER);
        $correctAnswer = isPrime($number) ? "yes" : "no";
        $tasks[] = [
            'question' => $number,
            'correctAnswer' => $correctAnswer
        ];
    }
    runGame($tasks, TASK_MESSAGE, NUMBER_OF_CYCLES);
}

function isPrime(int $number): bool
{
    if ($number < 2) {
        return false;
    }
    for ($i = 2, $s = sqrt($number); $i <= $s; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}
