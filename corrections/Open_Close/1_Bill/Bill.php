<?php

interface Itemable {
    
    public function price();
}

class Pizza implements Itemable{
    
    public function price()
    {
        return 20;
    }
}

class Burger implements Itemable{
    
    protected $discount;
    
    public function __construct($discount)
    {
        $this->discount = $discount;
    }
    public function price()
    {
        return 20 - $this->discount;
        
     }
}

class Panini implements Itemable
{
     public function price()
    {
        return 10;
        
     }
    
}


class Bill {
    
    public function pay(Itemable $item)
    {
        return $item->price();
    }
}
