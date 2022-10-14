# Exercice de Synthèse
# **{CHALLENGE}** Exercice 1 : Cart

Vous allez maintenant faire un exercice de synthèse sur les concepts SOLID que nous avons abordé.

Vous devez appliquer les principes S.O.L.I.D.

Utilisez composer pour l'autoloader. Toutes les classes du projet seront placées dans un dossier src/.

```
src/
    Cart.php
    Storable.php
    Productable.php
    Product.php
    StorageArray.php
    StorageSession.php 
app.php
composer.json

```

Dans le fichier `composer.json` vous devez configurer votre **autoload** comme suit :

```
"autoload": {
    "psr-4": {
        "": "src/"
    }
}
```

Identifiez bien chaque entité dans le projet en utilsant le diagramme de classe ci-après.

Deux systèmes de persistance seront testés : un StorageArray ou StorageSession.

Le panier est un panier d'un magazin bio vendant des fruits, créez quelques produits pour tester vos méthodes.

Aidez vous également du code ci-dessous pour créer ce panier.

* Diagramme de classe

![Dependency Inversion](./img/synthese.PNG)

* Exemple d'utilisation du code

```php
require_once __DIR__ . '/vendor/autoload.php';

// création des produits
$products = [
    'apple' => new Product('apple', 10.5),
    'raspberry' => new Product('raspberry', 13),
    'strawberry' => new Product('strawberry', 7.5),
    'orange' => new Product('orange', 7.5),
];

$storageSession =  new StorageSession; // persistance en Session
$storageArray =  new storageArray; // utilisation pour les tests
$storageDB =  new StorageDB; // persistance en DB
$storageFile =  new StorageFile; // persistance dans un fichier

// $cart = new Cart($storageSession);

$cart = new Cart($storageArray);

extract($products);

$cart->buy($apple, 3);
$cart->buy($apple, 4);
$cart->buy($apple, 5);
$cart->buy($strawberry, 10);

echo "\n";
echo $cart->total() ; // 241.2
echo "\n";

// retire un produit du panier
echo "restore" . "\n";
$cart->restore($strawberry);

echo "\n";
echo $cart->total() ; // 151.2
echo "\n";

```

# Exercice 2 : User

1. Que pensez-vous de la classe suivante ? Si celle-ci est non conforme, proposez une solution de refactorisation du code (codez la solution dans un fichier).

```php
class User {
  
    public function __construct(private string $name, private int $age){

    }
    
    // ...
    
    public function store() {
        // Store attributes into a database...
    }
}
```
La classe User a trop de responsabilités, le store doit se trouver dans une classe de type Repository (traitement base de données).

```php
class User {
  
    public function __construct(private string $name, private int $age){

    }
}
```
```php
// Repository pour traiter les données en BD.
class UserRepository
{

    public function store(User $user)
    {
        // Store the user into a database...
    }
}
```

# Exercice 03 : Rectangle

Voici deux classes Géométriques :

```php
class Rectangle {
    public function __construct(
        private float $w, 
        private float $h
    ) {}
}

class Square {
  
    public function __construct(private float $c) {
    }
}
```

Un étudiant propose la solution suivante pour calculer la somme des aires de chaque forme géométrique. Qu'est-ce que vous seriez tenté de lui dire si par exemple on introduit une nouvelle classe `Circle` dans le projet ?

Proposez une solution (codez-la dans un fichier) pour résoudre ce problème et explicitez le terme SOLID utilisé.

```php
class Area {
  
    public function __construct(
        private array $shapes = []
    ) {}
    
    public function sum() {
        foreach($this->shapes as $shape) {
            if($shape instanceof Square) {
                $area[] = ($shape->c)**2;
            } else if($shape instanceof Rectangle) {
                $area[] = $shape->w * $shape->h;
            }
        }
    
        return array_sum($area);
    }
}
```


```php
interface Calculable
{
    const PI = 3.14;
    const PRECISION_DECIMAL = 2;

    public function area():float;
}
```
```php
class Rectangle implements Calculable
{
    public function __construct(
        private float $w,
        private float $h
    ) {
    }

    public function area():float
    {
        return round ( $this->w * $this->h, self::PRECISION_DECIMAL) ;
    }
}
```
```php
class Square implements Calculable
{

    public function __construct(private float $c)
    {
    }

    public function area():float
    {
        return round (  ($this->c) ** 2, self::PRECISION_DECIMAL) ;
    }
}
```
```php
class Circle implements Calculable
{

    
    public function __construct(private float $r)
    {
    }

    public function area():float
    {
        return round( self::PI * ($this->r) ** 2, PRECISION_DECIMAL);
    }
}
```
```php
class Area
{
    const PRECISION_DECIMAL = 2;

    public function __construct(
        private array $shapes = []
    ) {
    }

    public function sum()
    {

        foreach ($this->shapes as $shape) $area[] = $shape->area();

        return round( array_sum($this->shapes), PRECISION_DECIMAL) ;
    }
}
```

# Exercice 04 : Feline

1. Que pensez-vous de la substitution ci-dessous, est-elle sans risque ? Nous remplaçons une classe parente par une classe enfante. Quel principe à votre avis avons nous brisé ?

```php
class Feline
{
    public function speak():string{

        return "grrr";
    }
}
```

```php
class Cat extends Feline
{
    public $behviour;

    public function sleep():string{

        return "a lot";
    }

    // ICI on brise le principe de Liskov en changent la signature de la méthode speak
    public function speak():void{

        $this->behviour = "grrr";
    }
}
```

```php
class CatInfo 
{

    public function info(Feline $cat)
    {

        return $cat->speak();
    }
}
```

```php
class SubCatInfo 
{

    public function info(Cat $cat)
    {
        return $cat->speak();
    }
}
```

2. Le principe suivant vous paraît-il cohérent, si oui, à quelle notion dans SOLID fait-il référence ?
|Principe : "Si vous remplacez une classe parente par une classe enfante, alors le comportement général de votre code ne devrait pas en être impacté."|

3. Dans l'exercice Book et Product dans le cours, nous avons remplacé une classe parente Product par une classe enfante Book. Quel problème avons-nous alors rencontré ?

# Exercice 05 : Form création de formulaire à la volée

On vous demande de développer un composant `ComponentForm` très simple pour générer des formulaires à la volée. On souhaiterait avoir un champ de formulaire de type `number`, `password` et `text`.

Faites un schéma pour expliciter votre projet avant de l'implémenter.

```
php -S localhost:8000 app.php
```

On affichera le formulaire :

```
FirsName : []
LastName : []
age : []
password : []

[Valider]
```