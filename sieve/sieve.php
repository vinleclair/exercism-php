<?php

function sieve(int $number) : array
{
    if ($number < 2) { return []; }
    if ($number == 2) { return [2]; }

    $numbers = array_fill(2, count(range(2, $number)), true); 

    for ($i = 2; $i <= abs(sqrt($number)); $i++) {
        if ($numbers[$i] == 1) {
            for ($j = pow($i, 2); $j <= $number; $j += $i) {
                $numbers[$j] = 0;
            } 
        }
    }

    return array_keys(array_filter($numbers, function($num) { return $num == true; }));
}
