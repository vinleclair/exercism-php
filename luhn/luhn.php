<?php

define("LUHN", [
    0 => 0,
    1 => 2,
    2 => 4,
    3 => 6,
    4 => 8,
    5 => 1,
    6 => 3,
    7 => 5,
    8 => 7,
    9 => 9
]);

/**
 * Given a number returns true if valid per the Luhn formula, else false
 * @param string $number to validate
 * @return bool
 */
function isValid(string $number) : bool 
{
    $number = str_replace(" ", "", $number);

    // Regex check if number contains only 2 or more digits, else return false
    if (preg_match('/^[\d]{2,}$/', $number) !== 1) { return false; };

    $digits = array_reverse(str_split($number));
    $digitsCount = count($digits);

    for ($i = 1; $i < $digitsCount; $i += 2) {
        $digits[$i] = LUHN[$digits[$i]]; 
    }

    return array_sum($digits) % 10 === 0;
}

