<?php

class Triangle
{
    public function __construct(float $side1, float $side2, float $side3)
    {
        $this->sides = [$side1, $side2, $side3];
        if (2 * max($this->sides) >= array_sum($this->sides)
            || $side1 === 0 
            || $side2 === 0 
            || $side3 === 0) {
            throw new InvalidArgumentException("Invalid triangle sides!");
        }
    }

    public function kind() : string 
    {
        $types = [1 => "equilateral", 2 => "isosceles", 3 => "scalene"];
        return $types[count(array_unique($this->sides))];
    }
}


