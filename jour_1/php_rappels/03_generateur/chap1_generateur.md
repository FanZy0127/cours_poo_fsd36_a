# Générateur

## Définition

Un générateur est une fonction normale qui possède un **yield** qui peut retourner autant de valeurs que nécessaire.

Toute fonction retournant un yield est un générateur.

```php
function gen(){
    for ($i = 0; $i <= 3; $i++) {
        yield $i;
    }
}
```

Lorsque vous appelez une fonction génératrice, elle retourne un objet que l'on peut parcourir.

```php
$generator = gen();
foreach ($generator as $value) {
    echo "$value\n";
}
/*
0
1
2
3
*/
```

## Exercice génératrice

1. Créez une fonction génératrice qui affiche les nombres pairs de 1 à 10.

2. Créez une autre fonction génératrice qui affiche les nombres pairs inférieur à un entier n.

## Exercice faire un xrange

Recodez le range avec un générateur. Le générateur retournera les valeurs que l'on précisera dans l'intervalle **start** et **limit**, définissez également un **step** qui désignera le pas entre deux valeurs.

```php
function xrange(int $start, int $limit, int $step = 1){
    // todo
}
```

## Exercice read content

Remarque : vous avez un fichier char.txt à lire dans le dossier content dans le dossier Exercices. 

Affichez les nombres pairs du fichier char.txt à l'aide d'un générateur.

## key value dans un générateur

Vous pouvez également produire des paires de clés/valeurs.

```php
function genkV(){
    for ($i = 0; $i <= 3; $i++) {
        yield $i => $i + 10;
    }
}
$generator = genkV();
foreach ($generator as $k => $v) {
    echo "k: $k v: $v\n";
}
/*
k: 0 v: 10
k: 1 v: 11
k: 2 v: 12
k: 3 v: 13
*/
```

## Exercice read content_key

Remarque : vous avez un fichier content_key.txt à lire dans le dossier content dans le dossier Exercices. 

Affichez les lettres et les nombres, ligne par ligne, à l'aide d'un générateur. 

```text
A 1
B 2
C 3
...
```

## Délégation from

La délégation d'un générateur vous permet d'obtenir les valeurs d'un autre générateur, soit d'un objet de type **traversable**, soit d'une structure de données de type **array**.

## Exercice répondre à la question

**yield from** permet de récupérer les valeurs d'un autre générateur. Sachant qu'il n'y a pas de ré-initialisation des clés avec from et que iterator_to_array retourne un tableau, qu'affichera le code suivant ?

Choisissez une seule et bonne réponse ci-après.

```php

// délégation
function inner() {
    yield 1; 
    yield 2; 
    yield 3; 
}
function genFrom() {
    yield from new ArrayIterator([5, 6]);
    yield 0; 
    yield from inner(); 
    yield 4; 
   
}

// instancie le générateur et retourne un tableau
var_dump(iterator_to_array(genFrom()));
```

1. [5, 6, 0, 1, 2, 3, 4]

2. [5, 6, 4]

3. [1, 2, 3, 4]

4. [1, 4, 3]

5. [1, 2, 4]

## Exercice suite de Fibonacci

Créez un générateur permettant d'afficher tous les termes de la suite de Fibonacci dans le terminal.

```php
foreach (getFibonacci() as $fibonacci) {
    // TODO affichez les termes de la suite
}
```

## Exercice calcul et délégation 

1. Affichez une suite de nombres entiers consécutifs à l'aide d'un générateur.

```text
    1
    2
    3
    4
    5
    ...
```

2. Pour tous les multiples de 3 dans la suite que vous venez de créer, les remplacer par une suite de longueur 3 de 1. Utilisez le principe de délégation avec les générateurs.

```text
1
2
1
1
1
4
5
1
1
1
7
...
```

## Exercice shop

Lire le contenu des fichiers du dossier **shop** dans le dossier **content** sur le serveur. Vous y trouverez le fichier **users** et **prices**. Affichez en console le nom et la somme dépensée pour chaque personne.