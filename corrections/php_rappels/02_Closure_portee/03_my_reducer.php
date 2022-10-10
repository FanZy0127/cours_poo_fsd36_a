<?php

function my_reduce($array, $callback, $initial = 0)
{
    $acc = $initial;
    foreach ($array as $curr)
        $acc = $callback($acc, $curr);

    return $acc;
}

$f = function ($acc, $curr) {
    return "f($acc,$curr)";
};

echo PHP_EOL ;

echo my_reduce([1, 2, 3], $f);

$sum = function ($acc, $curr) {
    return $acc + $curr;
};
echo PHP_EOL ;

echo my_reduce([1, 2, 3], $sum);

echo PHP_EOL ;
/* ------- */

$products = [['milk', 3, 3], ['butter', 2.5, 2] , ['eggs', .7, 10]];
define('TVA', .2);

$hydrate = function () use ($products) {
    $res = [];
    // list($name, $price, $quantity) =  ['milk', 3, 3] ; ...
    foreach ($products as list($name, $price, $quantity)) {

        $res[] = (new class(name: $name, price: $price, quantity: $quantity)
        {
            public function __construct(
                public float $price,
                public string $name,
                public float $quantity,
                public float $tva = TVA
            ) {}
        });
    }

    return $res;
};

var_dump($hydrate());

echo my_reduce($hydrate(), function($acc, $curr){

    $acc +=  ($curr->price * $curr->quantity) * ($curr->tva + 1);

    return $acc;

}, 0 );

echo PHP_EOL ;