<?php

$input = "A Y
B X
C Z";

$input = explode("\n", $input);

$mapping = [
    'A' => 'rock',
    'B' => 'paper',
    'C' => 'scissors',
    'X' => 'rock',
    'Y' => 'paper',
    'Z' => 'scissors',
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
    $my_play    = $mapping[$line[2]];

    echo "$their_play vs $my_play";

    if($their_play == $my_play) {
        $score += 3;

        echo " -> Tie";
    }
    else if($results["$their_play-$my_play"] === 1) {
        $score += 6;

        echo " -> Win";
    }
    else if($results["$their_play-$my_play"] === 0) {
        echo " -> Loss";
    }

    $score += $values[$my_play];

    echo "\n";
}

echo "Score: $score\n";