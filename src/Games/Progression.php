<?php

namespace BrainGames\Games\Progression;

use function cli\line;

function run() {
    line("What number is missing in the progression?");
    $progression = [];
    $start = rand (1, 30);
    $step = rand(2, 10);
    $maxIndex = rand(4, 9);
    $missedIndex = rand(0, $maxIndex);
    for ($i = 0; $i <= $maxIndex; $i++) {
        $progression[] = $start + $i * $step;
    }
    $question = implode(' ', array_slice($progression, 0, $missedIndex)) . ' .. '
    . implode(' ', array_slice($progression, $missedIndex + 1, $maxIndex));
    $correctAnswer = $progression[$missedIndex];
    $result = [
        'question' => $question,
        'correctAnswer' => $correctAnswer
    ];
    return $result;
}
