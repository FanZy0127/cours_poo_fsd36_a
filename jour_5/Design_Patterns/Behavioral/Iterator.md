# Itérateur

Les itérateurs permettent de parcourir simplement un ensemble de données. Un **foreach** permet d'itérer sur un ensemble par exemple.

Supposons que l'on souhaite lire le contenu d'un fichier comportant un grand nombre de lignes. On utilisera par exemple la fonction PHP **fopen** qui permet de lire ligne par ligne le fichier. Elle est permet de faire un script qui n'utilisera pas beaucoup de mémoire :

```php
$f = fopen('data/temperatures.txt', 'r');
while (!feof($f)) {
    // lecture ligne par ligne
    $line = fgets($f);
}
fclose($f);
```

à la place de ce code vous pouvez utiliser l'itérateur PHP SplFileObject :

```php
$temperatures = new SplFileObject('data/temperatures.txt');

foreach( $temperatures as $line ){
    // ...
}
```

En utilisant la méthode eof pour repérer la fin du fichier on peut itérer sur fichier pour lire son contenu ligne par ligne sans consommer beaucoup de mémoire.

```php
while (!$file->eof()) {
    $line  =  $file->fgets();
}
```

## Générateur d'utilisateur

Supposons que nous souhaitions configurer et traiter un ensemble de 10000 objets de type **User**, une première solution, peu optimale, serait de créer un tableau dans lequel on les placerait :

```php
class User{
    private string $name = 'anonymous';

    public function __construct(string $name){
        $this->name = $name;
    }

    public function getName():string{
        return $this->name;
    }
}

$count = 1;
$users = [];
while($count < 10000){
    $users[] = new User("Alan_$count") ;
    $count++;
}

$users = [new User('Alan_1'), new User('Alan_2'), ...];
```

Mais on peut également créer un **générateur** qui va les créer dynamiquement, sans occuper de la mémoire pour les stocker, notez la présence du mot clé yield, nous l'expliciterons ci-après :

```php
function generatorUser(){
    $count = 0;
    while($count < 10000){
        $count++;
        // préparation des objets en puissance
        yield  new User("name_$count");
    }
}
```

Une fois que l'on a créer le générateur il faudra alors itérer sur ce dernier à l'aide d'un foreach par exemple pour les récupérer :

```php
$generator = generatorUser();

foreach( $generator as $user) 
    echo $user->getName();
```

Dans ce cas nous avons fait l'économie de la place mémoire du premier tableau users.

Fonctionnement du générateur : 

- Il faut tout d'abord itérer sur le générateur pour exécuter le code, avec un foreach par exemple

- Le mot clé yield retourne une valeur sans sortir de la fonction. 

- Condition d'arrêt. On crée un **compteur** count dans l'exemple précédent, à chaque appel du générateur dans le foreach celui-ci garde la mémoire de la valeur de cette variable. Cela permet donc de définir une condition d'arrêt dans les itérations.


## 01 Exercice population itérateurs/générateurs

Soient deux fichiers txt populations.txt et relationships.txt. En vous aidant des itérateurs pour parcourir ces fichiers créez la classe ReadIterator. En utilisant les fonctions fopen et fgets ainsi que fclose. 

L'objectif est de récupérer dans un storage les relations explicitées dans le fichier relationships.txt des personnes du fichier populations.txt. Par exemple dans le fichier relationships.txt 0,1 indique que la personne 0 est en relation avec la personne 1 et réciproquement.

Respectez la structure de fichiers et dossiers suivantes :

<img src="images/relationships.png" width="150"  />

1. Créez un objet Person elle permettra d'hydrater les données que vous allez traiter dans les deux fichiers. Ajoutez dans cet objet Person un attribut relation (tableau PHP). Vous stockerez ces objets dans un Map PHP, voyez à ce sujet la remarque ci-après.

3. Ajoutez maintenant dans l'objet Person, à l'aide d'un script, les relations (liste relationships) de chaque personne de cette population. 

4. Calculer la moyenne des relations en parcourant l'ensemble des Persons de votre population.

Remarque :

- Vous pouvez utiliser les objets de type Map en PHP, dans ce cas dans le projet :

[Map](https://www.php.net/manual/fr/class.ds-map.php)

```php
$storage = new Ds\Map();
// dans l'objet Person on mettra ses relations
$person = new Person(name: "Alan");
$storage->put(0, $person); // clé/valeur
```

```bash
composer require php-ds/php-ds
```

- sur la conception d'un itérateur en PHP, il faudra dans ce cas implémenter l'interface Iterator comme suit :


```php
class myIterator implements Iterator {
    private $position = 0;
    private $array = [
        "premierelement",
        "secondelement",
        "dernierelement",
    ];  

    public function __construct() {
        $this->position = 0;
    }

    public function rewind() {
        $this->position = 0;
    }

    public function current() {
        return $this->array[$this->position];
    }

    public function key() {
        return $this->position;
    }

    public function next() {
        ++$this->position;
    }

    public function valid() {
        return isset($this->array[$this->position]);
    }
}

$it = new myIterator;

foreach($it as $key => $value) {
    var_dump($key, $value);
    echo "\n";
}

```





