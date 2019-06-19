<?php

define("LETTERS", 'ABCDEFGHIJKLMNOPQRSTUVWXYZ');
define("DIGITS", '1234567890');
define("NUMBEROFLETTERS", 2);
define("NUMBEROFDIGITS", 3);

class Robot
{
    private $generatedNames = array();

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
            $robotName =  $this->getRandomSubstring(LETTERS, NUMBEROFLETTERS) . $this->getRandomSubstring(DIGITS, NUMBEROFDIGITS); 
        } while (in_array($robotName, $this->generatedNames));

        $this->robotName = $robotName;
        array_push($this->generatedNames, $robotName);
    }

    private function getRandomSubstring(string $string, int $length)
    {
        return substr(str_shuffle($string), 1, $length);
    }
} 

