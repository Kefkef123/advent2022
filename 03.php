<?php

$input = "vJrwpWtwJgWrhcsFMMfFFhFp
jqHRNqRjqzjGDLGLrsFMfFZSrLrFZsSL
PmmdzqPrVvPwwTWBwg
wMqvLMZHhHMvwLHjbvcjnnSBnvTQFn
ttgJtRGJQctTZtZT
CrZsJsPPZsGzwwsLwLmpwMDw";

$input = explode("\n", $input);

$total = 0;

foreach($input as $line) {
    list($compartment1, $compartment2) = str_split($line, strlen($line) / 2);

    $char_counts1 = count_chars($compartment1, 1);
    $char_counts2 = count_chars($compartment2, 1);

    $common_char = array_keys(array_intersect_key($char_counts1, $char_counts2))[0];

    if($common_char < 97) {
        $number_score = $common_char - 38;
    }
    else {
        $number_score = $common_char - 96;
    }

    echo "Character " . chr($common_char) . " score $number_score \n";

    $total += $number_score;
}

echo "Total: $total\n";