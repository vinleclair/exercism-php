<?php

function wordCount(string $phrase) : array
{
    $words = str_word_count(strtolower($phrase), 1, '0123456789');
    return array_count_values($words);
}

