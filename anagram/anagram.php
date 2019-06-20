<?php

function detectAnagrams(string $word, array $possibleAnagrams) : array
{
    $letterCount = count_letters(strtolower($word));
    $anagrams = array();

    foreach ($possibleAnagrams as $possibleAnagram) {
        if ($letterCount == count_letters(strtolower($possibleAnagram)) && strtolower($word) != strtolower($possibleAnagram)) {
            array_push($anagrams, $possibleAnagram);
        }

    }
    return $anagrams;
}

function count_letters(string $word) : array
{
    $letterCount = array_fill_keys(array_unique(str_split($word)), 0);

    foreach (str_split($word) as $letter) {
        $letterCount[$letter] += 1;
    }

    return $letterCount;
}

