<?php

spl_autoload_register(function ($class) {
    include __DIR__ . '/' . $class . '.php';
});

/*
*
Vous pouvez tester le code avec psysh en ligne de commande en chargeant le contexte de app.php

psysh app.php

$products = [ new Book( name : 'Retour à Killybegs', price :10, isbn : "1234"), new Music( name : "AC/DC", price : 19 ), new Bike( name : "Brompton", price :1500 ) ];

$cart = new Cart;
// avec des quantités aléatoires 
foreach( $products as $p ) $cart->buy($p, rand(1, 10)) ;

echo $cart->total();
*/