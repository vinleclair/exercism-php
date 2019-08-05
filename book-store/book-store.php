<?php
define ("DISCOUNT", [
    1 => 0,
    2 => 0.05,
    3 => 0.10,
    4 => 0.20,
    5 => 0.25
]);

function total(array $basket) : float
{
    $series = array_count_values($basket);
    $counter = 1;
    $books = 0;
    $total = 0.0;
    while ($counter <= max($series)) {
        foreach ($series as $book => $count) {
            if ($count >= $counter) {
                $books += 1;
            }
        }
        $total += (($books * 8) - (DISCOUNT[$books] * $books * 8)); 
        $books = 0;
        $counter += 1;
    }


    return $total; 
}
