<?php

class Game
{
    private $currentRoll = 0;

    public function __construct()
    {
        $this->frames = array_fill(0, 21, 0);
    }

    public function roll(int $pins) {
        $this->frames[$this->currentRoll++] = $pins;
    }

    public function score() 
    {
        $score = 0;
        $firstInFrame = 0;

        for ($frame = 0; $frame < 10; $frame++) {
            if ($this->isStrike($firstInFrame)) {
                $score += 10 + $this->nextTwoBallsForStrike($firstInFrame);
                $firstInFrame++;
            } else if($this->isSpare($firstInFrame)) {
                $score += 10 + $this->nextBallForSpare($firstInFrame); 
                $firstInFrame += 2;
            } else {
                $score += $this->twoBallsInFrame($firstInFrame);
                $firstInFrame += 2;
            }
        }
        return $score;
    }

    private function isSpare(int $firstInFrame) 
    {
        return $this->frames[$firstInFrame] + $this->frames[$firstInFrame + 1] == 10;
    }

    private function isStrike(int $firstInFrame)
    {
        return $this->frames[$firstInFrame] == 10;
    }

    private function nextTwoBallsForStrike(int $firstInFrame) 
    {
        return $this->frames[$firstInFrame + 1] + $this->frames[$firstInFrame + 2];
    }

    private function nextBallForSpare(int $firstInFrame)
    {
        return $this->frames[$firstInFrame + 2];
    }

    private function twoBallsInFrame(int $firstInFrame)
    {
        return $this->frames[$firstInFrame] + $this->frames[$firstInFrame + 1];
    }
}
