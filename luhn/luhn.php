<?php

/**
 * Given a number returns true if valid per the Luhn formula, else false
 * @param string $number to validate
 * @return bool
 */
function isValid(string $number) : bool 
{
    $number = str_replace(" ", "", $number);

    // Regex check if number contains only 2 or more digits, else return false
    if (preg_match('/^[\d]{2,}$/', $number) != 1) { return false; };

    $digits = array_reverse(str_split($number));

    for ($i = 1; $i < count($digits); $i += 2) {
        $result = $digits[$i] * 2;
        $digits[$i] = ($result > 9) ? $result - 9 : $result; 
    }

    return array_sum($digits) % 10 == 0;
}

