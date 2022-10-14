<?php 

require_once 'src/IceCream.php';
require_once 'src/IceCreamBuilder.php';
require_once 'src/Menu.php';




use Icecream\{MenuGlacier, IceCreamBuilder};

$MenuGlace = new MenuGlacier(new IceCreamBuilder());

$glace1 = $MenuGlace->SundayCaramel("Pot");
$glace2 = $MenuGlace->boules_3_Caramel_Speculos("Gaufre");
echo "Sunday : " . $glace1 . "<br>";
echo "Glace 3 boules : Vanille, Chocolat, Café, avec Spéculos : " . $glace2 . "<br>";


