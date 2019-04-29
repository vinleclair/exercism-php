<?php

class Bob
{
    public function respondTo(string $statement) : string 
    {
        if (Statement::isQuestion($statement) && Statement::isYelling($statement)) {
            return "Calm down, I know what I'm doing!";
        } 
        
        if (Statement::isQuestion($statement)) {
            return "Sure.";
        } 
        
        if (Statement::isYelling($statement)) {
            return "Whoa, chill out!";
        } 
        
        if (Statement::isSilence($statement)) {
            return "Fine. Be that way!";
        } 
        
        return "Whatever.";
    }
}

class Statement
{
    public static function isSilence(string $statement) : bool 
    {
        return trim($statement) === "";
    }

    public static function isYelling(string $statement) : bool
    {
        return self::isWords($statement) && strtoupper($statement) === $statement;
    }

    private static function isWords(string $statement) : bool
    {
        return strtoupper($statement) != strtolower($statement);
    }

    public static function isQuestion(string $statement) : bool
    {
        return substr(rtrim($statement), -1) === "?";
    }
}
