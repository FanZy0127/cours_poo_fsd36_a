<?php

namespace Cart;

class StorageArray implements Storable{

    private array $storage = [];

    public function setValue(string $name, float $price):void{

        if(array_key_exists($name, $this->storage) === true){
            $this->storage[$name] += $price;

            return ;
        }

        $this->storage[$name] = $price;
    }

    public function restore(string $name):void{
        if(array_key_exists($name, $this->storage) === true)
            unset( $this->storage[$name] );
    }

    public function reset():void{
        $this->storage = [];
    }

    // TODO refactoring responsability ?
    public function total():float{

        return array_sum($this->storage);
    }

    public function getStorage():array{

        return $this->storage;
    }
}