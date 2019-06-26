<?php

class School
{
    protected $grades = [];

    public function add(string $student, int $grade)
    {
        if (!isset($this->grades[$grade])) {
            $this->grades[$grade] = [];
            ksort($this->grades);
        }
        $this->grades[$grade][] = $student; 
        sort($this->grades[$grade]);
    }

    public function grade(int $grade)
    {
        return $this->grades[$grade] ?? [];
    }

    public function studentsByGradeAlphabetical()
    {
        return $this->grades;
    }
}
