<?php

namespace Cart;

interface Productable{
    function getName():string;
    function setPrice(float $price):void;
    function getPrice():float;
}