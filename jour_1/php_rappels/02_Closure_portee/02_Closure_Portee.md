# Fonctions et classes anonymes

- Fonctions

Elles sont également appelées fermetures ou Closures, elles permettent la création de fonction sans nom. Elles sont largement utilisées dans les fonctions de callback (callable).

```php

$greet = function(string $name):void
{
    echo $name;
    echo "\n";
};

$greet('World');
$greet('PHP');
```

Les fonctions anonymes peuvent hériter des variables du contexte parent. Dans ce cas il faut utiliser le mot clé use :


```php
$message = "Hello";

$showMessage = function() use ($message) : void{
    echo "$message World";
};

$showMessage();
```

- Classe

Vous pouvez également définir des classes anonymes ou plus exactement des objets anonymes comme suit :

```php
$obj = new Class{};
```

Depuis la version 8 de PHP vous pouvez définir des attributs de vos classes de manière très synthétique comme suit, passage en paramètres du constructeur :

```php
$product = new class(1.2, "apple", 10)
{
    public function __construct(
        public float $price ,
        public string $name ,
        public float $quantity
    ) {
    }
};
```

## Exercice calcul de tva

1. Soit les produits suivants dans la variable products. En utilisant une closure et la fonction **array_map** sur le tableau, calculez le total TTC des produits. Vous prendrez comme tva 20% et donnerez une précision de 0.01 pour le résultat.

```php
$products = ['milk' => 3.5, 'butter' => 2.5, 'eggs' => 0.5 ];

total($tax = .2, $products);
```

2. Appliquez maintenant les quantités respectives suivantes au calcul TTC.

```php
$quantities = [3, 2, 10];
```

## Exercice addition de nombres spécifiques

Soit la matrice de prix HT suivante calculez le total TTC avec une tva de 20% des prix pairs uniquement. Essayez d'appliquer le principe "ne pas ré-inventer la roue", on ne touche pas au code métier, utilisez la fonction totalTTC déjà développée dans l'exercice précédent.

```php
$products = [
    [10, 7, 9, 8, 6],
    [15, 17, 4, 18, 3],
    [2, 20, 101, 81, 62],
    [32, 17, 25, 97, 16],
    [5, 17, 10, 5, 10],
 ];

// calculez le TTC
```

## Exercice reducer

Définition : un reducer applique une fonction qui est un "accumulateur" et qui traite chaque valeur d'un tableau ou collection (de la gauche vers la droite) afin de la **réduire à une seule valeur**.

1. Créez maintenant une fonction reduce à l'aide d'une fonction de callback passée en paramètre (reducer) de votre fonction.

```php
$numbers = [1,2,3];
// définissez la fonction $f
my_reduce($numbers, $f, $initial=0);
/*
$f = function ($acc, $curr) {
    return "f($acc,$curr)";
};
*/
// (f(f(0,1),2),3)

// On peut également faire la somme 
$sum = function($acc, $curr) { return $acc + $curr } ;
my_reduce($numbers, $sum, $initial=0);
// 6
```

2. Testez votre reducer pour additionner les nombres suivants :

```php
$numbers = [1,2,3];
my_reduce($numbers, $sum, $initial=0);
// 6
```

## Exercice hydratation et reducer

Soient les données suivantes : en utilisant une classe anonyme hydratez un tableau d'objets, chaque objet aura comme attribut un nom, un prix et une quantité. Puis calculez le total TTC à l'aide de votre reducer.

```php
// dans le tableau vous avez des tableaux nom, prix et quantité des produits
$products = [['milk', 3, 3], ['butter', 2.5, 2],['eggs', .7, 10]];
echo my_reduce($hydrate(), $callback, 0); // 21
```
