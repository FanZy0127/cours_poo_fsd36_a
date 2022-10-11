<?php

class Token{
    private $max = 10;
    
    public function token(){

        return random_bytes($this->max);
    }

    /**
     * Get the value of max
     */ 
    public function getMax()
    {
        return $this->max;
    }

    /**
     * Set the value of max
     *
     * @return  self
     */ 
    public function setMax($max)
    {
        $this->max = $max;

        return $this;
    }
}