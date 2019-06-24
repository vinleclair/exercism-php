<?php

function squareOfSum(int $num) : int
{
    return square(array_sum(range(0, $num)));
}

function sumOfSquares(int $num) : int
{
    return array_sum(array_map("square", range(0, $num)));
}

function difference(int $num) : int
{
    return squareOfSum($num) - sumOfSquares($num);
} 

function square(int $num) : int
{
    return $num * $num;
}
