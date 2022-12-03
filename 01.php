<?php

$input = "1000
2000
3000

4000

5000
6000

7000
8000
9000

10000";

$input = explode("\n", $input);

$elves = [];

$calories = 0;

foreach($input as $line) {
    if(!empty($line)) {
        $calories += (int) $line;
    }
    else {
        $elves[] = $calories;
        $calories = 0;
    }
}

rsort($elves);

echo "The elf with the most calories is carrying $elves[0]\n";

echo "The top 3 elves are carrying " . ($elves[0] + $elves[1] + $elves[2])."\n";