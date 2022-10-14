<?php

require_once 'Fighter.php';
require_once 'FighterState.php';
require_once 'States/Healthy.php';

final class Sleepy implements FighterState
{
    /** @var Fighter */
    private $Fighter;
    
    public function attack(Fighter $Fighter) : void
    {
        echo $this->Fighter->name() . ' est KO ...' . PHP_EOL;

        $this->Fighter->changeState(new Healthy());
    }

    public function setFighter(Fighter $Fighter) : FighterState
    {
        $this->Fighter = $Fighter;
        
        return $this;
    }
}
