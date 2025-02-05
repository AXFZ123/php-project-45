<?php

namespace BrainGames\Games\Prime;

use BrainGames\Engine;

const NUMBER_OF_CYCLES = 3;
const TASK_MESSAGE = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const MAX_NUMBER = 99;

function run(): void
{
    $tasks = [];
    [$primeList, $notPrimeList] = getPrimeAndNotPrimeNumbers(MAX_NUMBER);
    $primeListMaxIndex = count($primeList) - 1;
    $notPrimeListMaxIndex = count($notPrimeList) - 1;
    for ($i = 0; $i < NUMBER_OF_CYCLES; $i++) {
        if (rand(0, 1) === 0) { // Probability 50/50
            $question = $primeList[rand(1, $primeListMaxIndex)];
            $correctAnswer = 'yes';
        } else {
            $question = $notPrimeList[rand(1, $notPrimeListMaxIndex)];
            $correctAnswer = 'no';
        }
        $tasks[] = [
            'question' => $question,
            'correctAnswer' => $correctAnswer
        ];
    }
    Engine\runGame($tasks, TASK_MESSAGE, NUMBER_OF_CYCLES);
}

function getPrimeAndNotPrimeNumbers(int $limit): array
{
    $prime = [];
    $notPrime = [];
    for ($i = 2; $i <= $limit; $i++) {
        for ($k = 2, $half = $i / 2; $k <= $half; $k++) {
            if ($i % $k === 0) {
                $notPrime[] = $i;
                continue 2;
            }
        }
        $prime[] = $i;
    }
    return [$prime, $notPrime];
}
