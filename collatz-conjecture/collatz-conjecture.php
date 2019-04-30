<?php

function steps(int $number) : int 
{
    if ($number <= 0) { throw new InvalidArgumentException('Only positive numbers are allowed');}
    return collatzConjecture($number, 0);
}

function collatzConjecture(int $number, int $steps) : int
{
    if ($number == 1) {
        return $steps;
    } else {
        return collatzConjecture(($number % 2 == 0 ? $number / 2 : 3 * $number + 1), $steps + 1);
    }
}

