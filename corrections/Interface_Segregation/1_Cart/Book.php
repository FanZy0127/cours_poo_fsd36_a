<?php 

class Book implements Productable
{

    public function __construct(
        private float $price,
        private string $name,
        private string $isbn
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

    /**
     * Get the value of isbn
     */ 
    public function getIsbn()
    {
            return $this->isbn;
    }

    /**
     * Set the value of isbn
     *
     * @return  self
     */ 
    public function setIsbn(string $isbn):self
    {
            $this->isbn = $isbn;

            return $this;
    }
}
