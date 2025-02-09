<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\runGame;

const NUMBER_OF_CYCLES = 3;
const TASK_MESSAGE = "What number is missing in the progression?";
const START_INTERVAL = [1, 30];
const STEP_INTERVAL = [2, 10];
const MAX_INDEX_INTERVAL = [4, 9];

function run(): void
{
    $tasks = [];
    for ($i = 0; $i < NUMBER_OF_CYCLES; $i++) {
        $progression = [];
        $start = rand(START_INTERVAL[0], START_INTERVAL[1]);
        $step = rand(STEP_INTERVAL[0], STEP_INTERVAL[1]);
        $maxIndex = rand(MAX_INDEX_INTERVAL[0], MAX_INDEX_INTERVAL[1]);
        $missedIndex = rand(0, $maxIndex);
        for ($k = 0; $k <= $maxIndex; $k++) {
            $progression[] = $start + $k * $step;
        }
        $correctAnswer = $progression[$missedIndex];
        $progression[$missedIndex] = '..';
        $question = implode(' ', $progression);
        $tasks[] = [
            'question' => $question,
            'correctAnswer' => $correctAnswer
        ];
    }
    runGame($tasks, TASK_MESSAGE);
}
