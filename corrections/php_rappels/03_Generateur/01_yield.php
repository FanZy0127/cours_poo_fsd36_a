<?php

function gen(){
    for ($i = 1; $i <= 10; $i++) {
        if ($i % 2 == 0)
            yield $i;
    }
}

$generator = gen();
foreach ($generator as $value) {
    echo "$value\n";
}

echo "ta race Baptiste avec ton cours de merde";

/****************/

function generate(int $n) {
    for ($i = 0; $i <= $n; $i++) {
        if ($i % 2 == 0 & $i < $n)
            yield $i;
    }
}

$generator = generate(43);
foreach ($generator as $value) {
    echo "$value\n";
}