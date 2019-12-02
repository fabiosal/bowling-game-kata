<?php


use PHPUnit\Framework\TestCase;
use App\BowlingGame;

class BowlingGameTest extends TestCase
{

    private $game;

    public function setUp(){
        $this->game = new BowlingGame();

    }
    
    public function testRollWithZeroPins()
    { 

        $this->game->roll(0);
        $this->game->roll(0);

        $this->assertEquals(0, $this->game->score());
    
    }

    public function testRollWithSomePins()
    { 

        $this->game->roll(5);
        $this->game->roll(0);


        $this->assertEquals(5, $this->game->score());
    
    }

    public function testOneSingleFrame()
    { 

        $this->game->roll(5);
        $this->game->roll(3);

        $this->assertEquals(8, $this->game->score());
    
    }

    public function testGameWithTwoFrames()
    { 

        $this->game->roll(5);
        $this->game->roll(3);
        $this->game->roll(2);
        $this->game->roll(3);

        $this->assertEquals(13, $this->game->score());
    
    }

    public function testGameWithTwoFramesWithSpare()
    { 

        $this->game->roll(5);
        $this->game->roll(5);
        $this->game->roll(2);
        $this->game->roll(3);

        $this->assertEquals(17, $this->game->score());
    
    }

    public function testGameWithTwoFramesWithStrike()
    { 

        $this->game->roll(10);
        $this->game->roll(5);
        $this->game->roll(2);

        $this->assertEquals(24, $this->game->score());
    
    }
    
    public function testGameWithStrikeAtTheEnd()
    { 

        $this->game->roll(10);
        $this->game->roll(10);
        $this->game->roll(10);
        $this->game->roll(10);
        $this->game->roll(10);
        $this->game->roll(10);
        $this->game->roll(10);
        $this->game->roll(10);
        $this->game->roll(10);
        $this->game->roll(10);
        $this->game->roll(1);
        $this->game->roll(1);


        $this->assertEquals(273, $this->game->score());
    
    }

    public function testGameWithSpareAtTheEnd()
    { 

        $this->game->roll(10);
        $this->game->roll(10);
        $this->game->roll(10);
        $this->game->roll(10);
        $this->game->roll(10);
        $this->game->roll(10);
        $this->game->roll(10);
        $this->game->roll(10);
        $this->game->roll(10);
        $this->game->roll(5);
        $this->game->roll(5);
        $this->game->roll(1);

        $this->assertEquals(266, $this->game->score());
    
    }

    public function testEntireGame()
    { 

        $this->game->roll(10);
        $this->game->roll(5);
        $this->game->roll(2);
        $this->game->roll(10);
        $this->game->roll(5);
        $this->game->roll(2);
        $this->game->roll(10);
        $this->game->roll(5);
        $this->game->roll(2);
        $this->game->roll(10);
        $this->game->roll(5);
        $this->game->roll(2);
        $this->game->roll(10);
        $this->game->roll(5);
        $this->game->roll(2);

        //those should ont be considered
        $this->game->roll(2);
        $this->game->roll(2);
        $this->game->roll(2);

        $this->assertEquals(120, $this->game->score());
    
    }
}
