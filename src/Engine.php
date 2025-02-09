<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function runGame(array $tasks, string $taskMessage): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($taskMessage);
    foreach ($tasks as $task) {
        line("Question: %s", $task['question']);
        $answer = prompt("Your answer");
        if ($answer !== (string) $task['correctAnswer']) {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$task['correctAnswer']}'.");
            line("Let's try again, {$name}!");
            return;
        }
        line("Correct!");
    }
    line("Congratulations, $name!");
}
