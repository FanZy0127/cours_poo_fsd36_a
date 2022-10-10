<?php

$products = ['milk' => 3.5, 'butter' => 2.5, 'eggs' => 0.5];
$quantities = [3, 2, 10];

function totalTTC( array $products, float $tax = .2): float
{
    $total = 0.00; // on change la valeur par référence

    $callback =
        function ($price) use ($tax, &$total) {
            $total += $price  * ($tax + 1.0);
    };

    array_map($callback, $products);

    return round($total, 2);
}

echo totalTTC(products: $products);
echo PHP_EOL;


// total quantity
function totalQuantityTTC( array $products, array $quantities, float $tax = .2): float
{
    $total = 0.00;

    if(count($quantities) !== count($products) ) throw new Exception('no good');

    $callback =
        function ($price, $quantity) use ($tax, &$total) {
            $total += $price * $quantity * ($tax + 1.0);
    };

    array_map($callback, $products, $quantities);

    return round($total, 2);
}

echo  PHP_EOL;
echo totalQuantityTTC(products: $products, quantities : $quantities);
echo  PHP_EOL;
