<?php

namespace BrainGames\Games\Progression;

use BrainGames\Engine;

const NUMBER_OF_CYCLES = 3;
const TASK_MESSAGE = "What number is missing in the progression?";
const START_NUMBER_INTERVAL = [1, 30];
const STEP_VALUE_INTERVAL = [2, 10];
const PROGRESSION_MAX_INDEX_INTERVAL = [4, 9];

function run(): void
{
    $tasks = [];
    for ($i = 0; $i < NUMBER_OF_CYCLES; $i++) {
        $progression = [];
        $start = rand(START_NUMBER_INTERVAL[0], START_NUMBER_INTERVAL[1]);
        $step = rand(STEP_VALUE_INTERVAL[0], STEP_VALUE_INTERVAL[1]);
        $maxIndex = rand(PROGRESSION_MAX_INDEX_INTERVAL[0], PROGRESSION_MAX_INDEX_INTERVAL[1]);
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
    Engine\runGame($tasks, TASK_MESSAGE, NUMBER_OF_CYCLES);
}
