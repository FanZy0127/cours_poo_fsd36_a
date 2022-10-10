<?php 

$message = "WORLD";

$showMessage = function() use ($message) : void{

    $message = "$message World";
    echo "$message World";
};

$showMessage();

echo PHP_EOL;

echo "-------" . PHP_EOL;

echo $message;

echo PHP_EOL;

echo "-------" . PHP_EOL;
// 0.2 = .2
$tva = .2 ;
$total = 0;

$ttcBoutique1 = function($price) use ($tva, &$total) : float{
   $total += $price * (1 + $tva);

   return $price * (1 + $tva) ;
};

// .05 = 0.05
$ttcBoutique2 = function($price, $promo = .05) use ($tva, &$total) : float{
    $total += ( $price * (1 + $tva) ) - (1 + $promo) ;

    return ( $price * (1 + $tva) ) - (1 + $promo);
 };

echo "-------" . PHP_EOL;

$ttcBoutique1(100);
echo "------- TOTAL " . PHP_EOL;

echo $total . PHP_EOL;

$ttcBoutique2(200);

echo "------- TOTAL " . PHP_EOL;
echo $total . PHP_EOL;
