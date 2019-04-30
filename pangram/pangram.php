<?php

function isPangram(string $sentence) : bool
{
    $alphabet = range('a', 'z');
    $sentence = str_split(strtolower($sentence));
    
    return empty(array_diff($alphabet, $sentence));
}

