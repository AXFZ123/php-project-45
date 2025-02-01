<?php

namespace BrainGames\Engine;

use BrainGames\Games\Even;
use BrainGames\Games\Calc;
use BrainGames\Games\Gcd;
use BrainGames\Games\Progression;
use BrainGames\Games\Prime;

use function cli\line;
use function cli\prompt;

function runGame($gameType)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    for ($i = 0; $i < 3; $i++) {
        $result = match ($gameType) {
            'even' => Even\run(),
            'calc' => Calc\run(),
            'gcd' => Gcd\run(),
            'progression' => Progression\run(),
            'prime' => Prime\run()
        };
        line("Question: %s", $result['question']);
        $answer = prompt("Your answer");
        if ($answer === (string) $result['correctAnswer']) {
            line("Correct!");
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$result['correctAnswer']}'.");
            line("Let's try again, {$name}!");
            exit();
        }
    }
    line("Congratulations, {$name}!");
}
