<?php

namespace App;

class BowlingGame
{

    private $rolls;

    public function roll(int $pins)
    {
        $this->rolls[] = $pins;
    }

    public function score()
    {
        $currentFrame=0;

        for ($i=0; $i<count($this->rolls); $i = $i+2) {
            if ($this->isStrike($i)) {
                array_splice($this->rolls, $i+1, 0, 0);
            }

            $frame[$currentFrame] = $this->rolls[$i] + $this->rolls[$i+1];

            if ($this->isStrike($i)) {
                $frame[$currentFrame] += $this->rolls[$i+2];
                $frame[$currentFrame] += $this->rolls[$i+3];
            } elseif ($this->isSpare($i)) {
                $frame[$currentFrame] += $this->rolls[$i+2];
            }

            $currentFrame++;

            if($currentFrame >= 10 ){
                //the game is over
                break; 
            }
        }

        return array_sum($frame);
    }

    private function isStrike(int $i)
    {
        return $this->rolls[$i] === 10;
    }

    private function isSpare(int $i)
    {
        return $this->rolls[$i]+$this->rolls[$i+1] === 10;
    }
}
