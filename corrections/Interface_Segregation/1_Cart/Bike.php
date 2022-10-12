<?php

class Bike implements Productable
{

    public function __construct(
        private float $price,
        private string $name
    ) {
    }

    public function getName(): string
    {

        return $this->name;
    }

    public function setName(string $name): self
    {

        $this->name = $name;

        return $this;
    }

    public function getPrice(): float
    {

        return $this->price;
    }

    public function setPrice(float $price): self
    {

        $this->price = round($price, Productable::PRECISION_DECIMAL);

        return $this;
    }
}
