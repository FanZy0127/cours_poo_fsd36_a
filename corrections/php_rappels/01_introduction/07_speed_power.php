<?php

function speed_power($x, $n)
{
    static $count = 0;

    $count++;

    echo $count;

    if ($n === 1) return $x; // condition terminale la fonction n'est plus appelée qu'il y a remonté des recursions

    if ($n % 2 === 0) {
        $z = speed_power($x, $n / 2);

        return $z * $z; // en attente
    } else {
        $z = speed_power($x, ($n - 1) / 2); // <- 3, 27, 2187

        return $z * $z * $x; // en attente
    }
}

// echo speed_power(3, 15);

/*

3^11

11 =>  z = speed_power(3, 5)   => z = speed_power(3, 2)  =>  z = speed_power(3, 1) => 3
            z * z * 3                 z * z * 3                    z * z
          9*9*3 * 9*9*3 * 3           z  = 9*9*3                   z = 9


3^15 

15 =>  z = speed_power(3, 7)   => z = speed_power(3, 3)  =>  z = speed_power(3, 1) =>  x = 3
        z * z * x                    z * z * x                    z * z * x
        z = 3^7 * 3^7 * 3 = 3^15     z = 3^3 * 3^3 * 3 = 3^7      z = 3^3              <-- phase de remontée faire un return pour récupérer les résultats

En maths 
z = 3^10 = (3^5)^2
*/


function power_simple($x, $n){

}