<?php
define("NUMERALS", [
    1000 => "M",
    900 => "CM",
    500 => "D",
    400 => "CD",
    100 => "C",
    90 => "XC",
    50 => "L",
    40 => "XL",
    10 => "X",
    9 => "IX",
    5 => "V",
    4 => "IV",
    1 => "I"
]);
   
function toRoman(int $number) : string 
{
    return convert($number, "");
}

function convert (int $number, string $result) : string 
{
    if ($number === 0) {
        return $result;
    } else {
        foreach(NUMERALS as $arabic => $roman) {
            if ($number - $arabic >= 0) {
                return convert($number - $arabic, $result .= $roman);
            }
        }
    }
}

