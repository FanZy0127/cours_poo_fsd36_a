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


echo my_reduce($hydrate(), function($acc, $curr){

    $acc +=  ($curr->price * $curr->quantity) * ($curr->tva + 1);

    return $acc;

}, 0 );

echo PHP_EOL ;