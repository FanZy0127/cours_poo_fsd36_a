<?php

namespace Cart;

interface Storable{

    function setValue(string $name, float $price):void;
    function restore(string $name):void;
    function reset():void;
    // function total():float;

    function getStorage():array;
}