<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function runGame(array $tasks, string $taskMessage, int $numberOfCycles)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($taskMessage);
    for ($i = 0; $i < $numberOfCycles; $i++) {
        line("Question: %s", $tasks[$i]['question']);
        $answer = prompt("Your answer");
        if ($answer !== (string) $tasks[$i]['correctAnswer']) {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$tasks[$i]['correctAnswer']}'.");
            line("Let's try again, {$name}!");
            return false;
        }
        line("Correct!");
    }
    line("Congratulations, $name!");
}
