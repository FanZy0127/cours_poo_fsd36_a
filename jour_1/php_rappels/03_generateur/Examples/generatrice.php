<?php

function gen(){
    for ($i = 0; $i <= 3; $i++) {
        yield $i; 
    }
}

$gen = gen();

var_dump($gen); 

echo PHP_EOL ;

foreach($gen as $i) echo $i .PHP_EOL;

echo PHP_EOL ;

$gen = gen();

foreach(gen() as $i) echo $i .PHP_EOL;