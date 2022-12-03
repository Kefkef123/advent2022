<?php

$input = "A Y
B X
C Z";

$input = explode("\n", $input);

$mapping = [
    'A' => 'rock',
    'B' => 'paper',
    'C' => 'scissors',
];

$results = [
    'rock-paper'        => 1,
    'rock-scissors'     => 0,
    'paper-rock'        => 0,
    'paper-scissors'    => 1,
    'scissors-rock'     => 1,
    'scissors-paper'    => 0,
];

$values = [
    'rock'      => 1,
    'paper'     => 2,
    'scissors'  => 3,
];

$score = 0;

foreach($input as $line) {
    $their_play = $mapping[$line[0]];
    $needed_result    = $line[2];

    $possible_plays = array_values($mapping);
    $possible_plays = array_diff($possible_plays, [$their_play]);

    switch($needed_result) {
        // loss
        case 'X':
            foreach($possible_plays as $possible_play) {
                if($results["$their_play-$possible_play"] === 0) {
                    $my_play = $possible_play;

                    echo "Playing $possible_play to lose\n";
                }
            }
            break;
        // tie
        case 'Y':
            // choose same option
            $my_play = $their_play;
            $score += 3;

            echo "Playing $my_play to tie\n";
            break;
        // win
        case 'Z':
            foreach($possible_plays as $possible_play) {
                if($results["$their_play-$possible_play"] === 1) {
                    $my_play = $possible_play;

                    echo "Playing $possible_play to win\n";
                }
            }

            $score += 6;
            break;
    }

    $score += $values[$my_play];
}

echo "Score: $score\n";