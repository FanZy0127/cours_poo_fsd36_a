<?php

namespace Cart;

class Product implements Productable
{

    public function __construct(private string $name, private float $price)
    {
    }

    public function getName(): string
    {

        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getPrice(): float
    {

        return $this->price;
    }
}
