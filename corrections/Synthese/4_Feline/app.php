<?php
class Feline
{
    public function speak():string{

        return "grrr";
    }
}
class Cat extends Feline
{
    public $behviour;

    public function sleep():string{

        return "a lot";
    }

    public function speak():void{

        $this->behviour = "grrr";
    }
}

class CatInfo 
{

    public function info(Feline $cat)
    {

        return $cat->speak();
    }
}

class SubCatInfo 
{

    public function info(Cat $cat)
    {
        return $cat->speak();
    }
}