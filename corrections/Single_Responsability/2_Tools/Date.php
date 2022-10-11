<?php

class Date{
    private $format = 'd/m/y';

    public function date($date)
    {
        return (new DateTime($date))->format($this->format);
    }
}