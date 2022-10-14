<?php

interface Calculable
{
    public function area();
}

class Rectangle implements Calculable
{
    public function __construct(
        private float $w,
        private float $h
    ) {
    }

    public function area()
    {
        return $this->w * $this->h;
    }
}

class Square implements Calculable
{

    public function __construct(private float $c)
    {
    }

    public function area()
    {
        return ($this->c) ** 2;
    }
}

class Area
{

    public function __construct(
        private array $shapes = []
    ) {
    }

    public function sum()
    {

        foreach ($this->shapes as $shape) $area[] = $shape->area();

        return array_sum($this->shapes);
    }
}
