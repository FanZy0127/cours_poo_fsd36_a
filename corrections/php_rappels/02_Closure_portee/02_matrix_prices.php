<?php

namespace solution_01 {

    $matrix_of_products = [
        [10, 7, 9, 8, 6],
        [15, 17, 4, 18, 3],
        [2, 20, 101, 81, 62],
        [32, 17, 25, 97, 16],
        [5, 17, 10, 5, 10],
    ];

    function totalTTC(array $matrix_of_products, float $tax = .2): float
    {
        $total = 0.00; // on change la valeur par référence
        // $total = 28.8;
        $callback =
            function ($price) use ($tax, &$total) {
            // [10, 7, 9, 8, 6]
                if ($price % 2 === 0) // modification 1
                    $total += $price  * ($tax + 1.0);
            };

        // ré-écrire la fonction métier <=> mauvaise approche modification 2
        foreach ($matrix_of_products as $array_of_products)
            array_map($callback, $array_of_products);

        return round($total, 2);
    }

    echo totalTTC(matrix_of_products: $matrix_of_products) . PHP_EOL;
}

namespace solution_02 {

    // On ne ré-invente rien meilleur des approches possibles on fait le code dans la partie script de l'application et pas 
    // dans la partie métier
    $products = [
        [10, 7, 9, 8, 6],
        [15, 17, 4, 18, 3],
        [2, 20, 101, 81, 62],
        [32, 17, 25, 97, 16],
        [5, 17, 10, 5, 10],
    ];

    function totalTTC(array $products, float $tax = .2): float
    {
        $total = 0.00; // on change la valeur par référence

        $callback =
            function ($price) use ($tax, &$total) {
                    $total += $price  * ($tax + 1.0);
            };

        array_map($callback, $products);

        return round($total, 2);
    }

    $total = 0;
    foreach($products as $line){
        $p = [];
        foreach($line as $product) { 
            if($product % 2 != 0) continue; 
            $p[] = $product; 
        }

        $total += totalTTC(products: $p);
    }

    echo $total .PHP_EOL ;
}
