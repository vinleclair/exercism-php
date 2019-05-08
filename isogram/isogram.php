<?php

function isIsogram(string $str) : bool
{
    preg_match_all('/(\w)(?=.*?\1)/iu', $str, $matches);
    
    return empty($matches[0]);
}

