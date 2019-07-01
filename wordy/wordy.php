<?php

function calculate($str) {
    $str = preg_replace('#^What is (.+?)\?$#ui', '$1', $str);
    $str = str_replace(' by', '', $str);

    $map = [
        'plus' =>       function($a, $b){ return $a + $b; },
        'minus' =>      function($a, $b){ return $a - $b; },
        'multiplied' => function($a, $b){ return $a * $b; },
        'divided' =>    function($a, $b){ return $a / $b; },
    ];

    $values = explode(' ', $str);

    $buffer = 0;
    $stack = $map['plus'];
    foreach ($values as $value) {
        if (array_key_exists($value, $map)) {
            $stack = $map[$value];
        } else if (is_numeric($value)) {
            $buffer = $stack($buffer, $value);
        } else {
            throw new InvalidArgumentException('Argument is invalid');
        }
    }

    return $buffer;
}

