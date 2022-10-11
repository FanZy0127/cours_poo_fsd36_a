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

echo "Autre exemple";
echo PHP_EOL;

/****************/

function generate(int $n) {
    for ($i = 0; $i <= $n; $i++) {
        if ($i % 2 == 0 & $i < $n)
            yield $i;
    }
}

$generator = generate(11);
foreach ($generator as $value) {
    echo "$value\n";
}

/*******************************************/


function genkV(){
    for ($i = 0; $i <= 3; $i++) {
        yield $i => $i + 10;
    }
}
$generator = genkV();
foreach ($generator as $key => $value) {
    echo "key: $key value: $value\n";
}