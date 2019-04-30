<?php

define("VOWELS", ["a", "e", "i", "o", "u", "y"]);

function translate(string $sentence) : string
{
    $sentence = explode(" ", $sentence);
    $piglatin = [];
    foreach ($sentence as $word) {
        $piglatin[] = translateWord($word);
    }
    return implode(" ", $piglatin);
}

function translateWord(string $word) : string
{
    if (startsWithVowel($word)) {
        return $word .= "ay";
    } else {
        preg_match('/(?:qu|[^aeiou])*/i', $word, $matches);
        $length = strlen($matches[0]);
        return substr($word, $length) . $matches[0] . "ay"; 
    }

}

function startsWithVowel(string $word) : bool
{
    foreach (VOWELS as $vowel) {
        if (substr($word, 0, 1) == $vowel) {
            return true;
        }
    }
    return false;
}
