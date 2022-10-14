<?php

require_once 'Fighter.php';
require_once 'FighterState.php';

final class Rage implements FighterState
{
    /** @var Fighter */
    private $Fighter;
    
    public function attack(Fighter $Fighter) : void
    {
        // un pourcentage de chance de se blesser
        
        if ($this->isTooMuchAngry())
        {
            // Le monstre se blesse tout seul !
            $this->Fighter->healthPoints -= $this->Fighter->strength();
            
            echo $this->Fighter->name() . ' est fou de rage et s\'inflige des dégats' . PHP_EOL;
        } else {
            $Fighter->healthPoints -= $this->Fighter->strength();
        
            echo $this->Fighter->name() . ' attaque malgré sa rage' . PHP_EOL;
        }
        
    }

    public function setFighter(Fighter $Fighter) : FighterState
    {
        $this->Fighter = $Fighter;
        
        return $this;
    }

    private function isTooMuchAngry() : bool
    {
        return (bool) rand(1, 100) > 60;
    }
}