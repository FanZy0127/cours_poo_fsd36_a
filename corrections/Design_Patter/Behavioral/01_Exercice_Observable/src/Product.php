<?php

namespace Cart;

class Product{

    /**
     * name
     *
     * @var string
     */
    private $name;

    /**
     * price
     *
     * @var float
     */
    private $price;

    public function __construct($name, $price)
    {
        $this->setName($name);
        $this->setPrice($price);
        
    }

    /**
     * Get name
     *
     * @return  string
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param  string  $name  name
     *
     * @return  self
     */ 
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get price
     *
     * @return  float
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set price
     *
     * @param  float  $price  price
     *
     * @return  self
     */ 
    public function setPrice(float $price)
    {
        $this->price = $price;

        return $this;
    }
}
