<?php

require_once __DIR__ . '/vendor/autoload.php';

use Cart\{Product,StorageArray, StorageSession, Cart };

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// $cart = new Cart(new StorageArray);
$cart = new Cart(new StorageSession);

$products = [
    'apple' => new Product('apple', 10.5),
    'raspberry' => new Product('raspberry', 13.),
    'orange' => new Product('orange', 7.5),
];

// extrait chaque clé en créant la variable clé ayant la valeur de cette clé.
extract($products);

$cart->buy($apple, 3);

var_dump($cart->total());