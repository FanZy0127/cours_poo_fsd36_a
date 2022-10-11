<?php

class Lamp{

    private Light $light;

    // Composition
    public function __construct(Light $light)
    {
        $this->light = $light;
    }

    public function switch():void{
        $this->light->turn();
    }

    // Methode de PHP qui se déclenche lorsqu'on a fait un echo/var_dump ... sortie dans le script
    public function __toString():string
    {
        return "State : {$this->light->getStatus()} ";
    }
}