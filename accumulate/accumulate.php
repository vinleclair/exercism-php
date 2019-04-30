<?php

function accumulate(array $input, callable $accumulator)
{
    foreach ($input as &$element){
        $element = $accumulator($element);
    }
    return $input;
}
