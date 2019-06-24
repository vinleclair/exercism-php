<?php

class Robot
{
    private const LETTERS = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    private const DIGITS = '1234567890';
    private const NUMBEROFLETTERS = 2;
    private const NUMBEROFDIGITS = 3;

    private $generatedNames = [];

    public function __construct()
    {
        $this->reset();
    }

    public function getName()
    {
        return $this->robotName;
    }

    public function reset()
    {
        do {
            $robotName =  $this->getRandomSubstring(self::LETTERS, self::NUMBEROFLETTERS) . $this->getRandomSubstring(self::DIGITS, self::NUMBEROFDIGITS); 
        } while (in_array($robotName, $this->generatedNames));

        $this->robotName = $robotName;
        $this->generatedNames[] = $robotName;
    }

    private function getRandomSubstring(string $string, int $length)
    {
        return substr(str_shuffle($string), 1, $length);
    }
} 

