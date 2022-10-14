<?php

require_once 'Fighter.php';
require_once 'FighterState.php';

final class Healthy implements FighterState
{
    /** @var Fighter */
    private $Fighter;
    
    public function attack(Fighter $Fighter) : void
    {
        $Fighter->healthPoints -= $this->Fighter->strength();

        echo $this->Fighter->name() . ' attaque !' . PHP_EOL;
    }

    public function setFighter(Fighter $Fighter) : FighterState
    {
        $this->Fighter = $Fighter;
        
        return $this;
    }
}
