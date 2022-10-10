<?php

function dump($results)
{
    echo '<pre>';
    print_r($results);
    echo '</pre>';
}

/**
* Boolean
*/
/*
*  Exercise quelle valeur de boolean retourne les expressions suivantes
*/

dump('test logique');

$exp1 = (0!= 0 && 1/0 == 2) ;    
dump($exp1? 'exp1 vrai' : 'exp1 faux');

$exp2 = (!true || true) ;
dump($exp2? 'exp2 vrai' : 'exp2 faux');

$exp3 = (!true || false) ;
dump($exp3? 'exp3 vrai' : 'exp3 faux');

$exp4 = !(true || true) ;
dump($exp4? 'exp4 vrai' : 'exp4 faux');

$exp5 = (true || false) && false;
dump($exp5? 'exp5 vrai' : 'exp5 faux');

$exp6 = (true || false) && true;
dump($exp6? 'exp6 vrai' : 'exp6 faux');

$exp7 = (true || false) && ( (!false && true) || true );
dump($exp7? 'exp7 vrai' : 'exp7 faux');

$exp8 = ((false || false) && (!false && false)) || true ;
dump($exp8? 'exp8 vrai' : 'exp8 faux');

$exp9 = (false || false) && (!false && false) || true ;
dump($exp9? 'exp9 vrai' : 'exp9 faux');

$exp10 = 3*3.5 > 10 ;
$exp11 = 3*7  == 21 ;
$exp12 = 3-1 >= 1;
$exp13 = 0 < pow(2,10) == pow(2,10);
$exp14 = !(!true);
$exp15 = (5.5*2 == 11 || 1/2 != .5) && (3%2 == 0);
$exp16 = (5.5*2 == 11 || 1/2 != .5) && (3%2 != 0);

/*
 * Exercise
 *
 *  écrire un script pour déterminer le maximun de trois variables distinctes $a, $b et $c
 *
 */
$a = 10;
$b = 5;
$c = 7;

// response

if ($a > $b) {
    if ($a > $c) $m = $a;
    else $m = $c;
} else {
    if ($b > $c) $m = $b;
    else $m = $b;
}

echo $m;

/**
 *  Exercise
 *
 * écrire un script permettant de déterminer la valeur maximal d'un tableau d'entiers
 *
 */

$array = [1,2,5,10,5,12,55,100,48,123,54];

$num = $array[0];

for ($i = 0; $i < count($array); $i++) {
    if ($array[0] > $num) $num = $array[0];
}

dump($num);

/**
 * Exercise
 *
 * Soit le tableau $data ci-dessous, compter dans un tableau $results le nombre d'occurences des entiers du tableau $data
 *
 * Note: la clé du tableau $results sera la valeur du tableau $data et la valeur son nombre d'occurences
 *
 *  */

$results = [];

$data = [1, 1, 2, 3, 4, 8, 8, 5, 6, 6, 9, 9, 10, 11, 12, 14, 48, 48, 51, 51, 1, 1, 1, 51, 3, 3, 3, 51, 51, 51, 51, 51, 0];

foreach ($data as $elem1) {

    if (in_array($elem1, $results)) continue;

    $results[$elem1] = 0;

    foreach ($data as $elem2) {
        if ($elem1 == $elem2) $results[$elem1] += 1;
    }
}

dump($results);

/**
 * Exercise (challenge)
 *
 * écrire un script qui retourne dans un tableau les 100 premiers nombre premiers
 */

// version avec une condition maths 
$primary = [2];

$max = 100;
$limit = sqrt($max); // 
for ($i = 3; $i <= $max; $i++) {

    //$num = count($primary);
    $eras = sqrt($i);  //
    $test = [];
    foreach ($primary as $p) {
        if ($p > $eras) break;
        $test[] = $p;
    }
    $num = count($test);
    for ($j = 0; ($j < $num && ($i % $test[$j] != 0)); $j++) ;
    if ($j == $num) $primary[] = $i;
}

dump($primary);

// version plus simple mais moins optimisé

$primary = [2];

$max = 100;
for ($i = 3; $i <= $max; $i++) {

    $num = count($primary);
    for ($j = 0; ($j < $num && ($i % $primary[$j] != 0)); $j++) ;
    if ($j == $num) $primary[] = $i;
}

dump($primary);

/**
 * Exercise
 *
 * Décomposé un nombre N en produit de puissance nombre premier 
 * 
 */

$n = 125;
$fact=[];
for ($i = 2; $i <= $n; $i++ ) {
    while( $n % $i === 0 ) {
        $fact[] = $i;
        $n = $n / $i;
    }
}

dump($fact);


/*
     Fonctions
*/


/**
* exercise Calculer une puissance
*/

function puissance(int $x, int $n)
{

    if($n == 0) 
        return 1;
    elseif($n == 1) 
        return $x;
    else 
        return $x * puissance($x, $n-1);

}

dump(puissance(2,20));

// optimisation du calcul de puissance $x^2k = ($x^k*$x^k)^2 ou $x^(2k+1) = $x*$x^2k = $x*($x^k*$x^k)^2

function puissance_opt(int $x, int $n)
{

    if($n == 0) 
        return 1;
    elseif($n == 1) 
        return $x;
    else 
    {
        // on peut factoriser $rec = puissance_opt($x, (int) $n/2);
        if( $n%2 == 0) 
            return puissance_opt($x, $n/2) * puissance_opt($x, $n/2);
        else
            return $x * puissance_opt($x, ($n-1)/2) * puissance_opt($x, ($n-1)/2);
    }

}

dump(puissance_opt(2,20));



/*
* Exercise que se passe t il lors de l'exécution de la fonction g() ?
*/
function f($x)
{
    return ((3*$x + 1) % 11) ;
}

function g()
{
    $sum = 0 ;
    for($i=0;$i<10;$i++)
    {
        $d = f($i);
        $sum += 1 / $d;
    }

    return $sum;
}


g();

/**
* Exercise 
* écrire une fonction qui calcule le maximun de trois valeurs, vous appelerez cette fonction max3($a,$b,$c)
*/

function max3($a, $b, $c)
{
    $max = function($u, $v){

        if($u>$v) return $u;

        return $v;

    };

    return $max($a, $max($b, $c));
}


dump(max3(10,2,3));
dump(max3(1,20,3));
dump(max3(1,2,30));

/*
* Exercise 
*  écrire une fonction qui recherche une valeur dans un tableau trié. Trouvez une idée pour faire une recherche qui au pire des cas 
*  ne sera pas en nombre d'étape de recherche égale à la longueur du tableau. 
*/

function search_dicto(int $elem, array $array)
{
    $max = count($array);
    $start = 0 ; $end = $max - 1;
    while($start <= $end )
    {
        $middle = (int) (($start + $end)/2);

        if($elem == $array[$middle]) return $elem;

        if( $elem > $array[$middle] ) $start = $middle + 1 ;

        else $end = $middle - 1;

    }

    return 'none';
}


dump(search_dicto(520, [1,10,11,12,45,89,100,120,123,145,200,210,247,250,300,458,510,520]));

/*
* exercise crypto César décallage de l'ordre par position de lettre
*
*/

function char_rot($n,$c)
{
	$code = ord($c);
	// on ne traite pas cette plage de code dans la table ASCII
	if($code < 64 || $code > 91) return;
	
	if($code > 96 && $code < 123)
	{
		$num = ( ($code - 97  + $n) % 26 ) + 97 ; // translation à 0 puis redécallage à 97 pour se positionner sur les majuscules
	}

	if($code > 64 && $code < 91){
		$num = ( ($code - 65  + $n) % 26 ) + 65 ;
	}

	return chr($num);
}

// tests

echo '<pre>';
print_r(char_rot(1, 'Z'));
echo '</pre>';

function cesear($num, $message){
	$len = strlen($message);
	$code = '';

	for ($i=0; $i <$len ; $i++) { 
		$code .=  char_rot($num, $message[$i]);
	}

	return $code;
}

echo '<pre>';
print_r(cesear(2,'ABCDEFGHIJKLMNOPQRSTUVWXYZ'));
echo '</pre>';

echo '<pre>';
print_r(cesear(2, strtolower('ABCDEFGHIJKLMNOPQRSTUVWXYZ')));
echo '</pre>';

/**
* Exercicse crypt Vigenere sur les caractères majuscules
*/

function char_vigen_encode($a, $b)
{
	return char_rot(ord($b) - 65, $a);
}

function char_vigen_decode($a, $b)
{

	$num = 26 - (ord($b) - 65) ; // reculer

	return char_rot($num, $a);
}

echo '<pre>';
print_r(char_vigen_encode('T', 'E')); // X voir la table de vigenere 
echo '</pre>';

echo '<pre>';
print_r(char_vigen_decode('X', 'E')); // T voir table vigenere
echo '</pre>';

// Vigenere encode et decode
// Dans l'absolu on peut faire qu'une fonction pour traiter l'encodage et décodage mais c'est trop technique pour l'instant alors comprenez déjà l'algo de ces deux fonctions et se sera très bien.
function vigen_decode(string $str, string $key)
{
	$len = strlen($str);
	$lenKey = strlen($key); // $lenKey et $len peuvent être différent en longueur

	$code = '';
	$j = 0 ;
	for ($i=0; $i < $len ; $i++) { 

	if($str[$i] == ' ') {
		$code .= ' '; continue;
	}

	$code .= char_vigen_decode($str[$i], $key[$j % $lenKey]);

	$j++;
	}

	return $code;
}

function vigen_encode(string $str, string $key)
{
	$len = strlen($str);
	$lenKey = strlen($key); // $lenKey et $len peuvent être différent en longueur

	$code = '';
	$j = 0 ;
	for ($i=0; $i < $len ; $i++) { 

		if($str[$i] == ' ') {
			$code .= ' '; continue;
		}

		$code .= char_vigen_encode($str[$i], $key[$j % $lenKey]);

		$j++;
	}

	return $code;
}

echo '<pre>';
print_r(vigen_encode("HELLO WORLD", "SECRETKEY"));
echo '</pre>';

echo '<pre>';
print_r(vigen_decode("ZINCS PYVJV", "SECRETKEY"));
echo '</pre>';

echo '<pre>';
print_r(vigen_encode("LES DEV A FORCE DE FAIRE DE L ALGO IL VONT DEVENIR SUPERS FORTS", "SECRETKEY"));
echo '</pre>';

echo '<pre>';
print_r(vigen_decode("DIU UIO K JMJGG UI YKMPW HG C EEQS GD ZQEX WOZCFMT JYIOVQ XSTKW", "SECRETKEY"));











