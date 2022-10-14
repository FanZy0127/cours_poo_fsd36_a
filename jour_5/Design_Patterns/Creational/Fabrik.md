# Fabrique et fabrique abstraite

La fabrique est un patron de création.

La fabrique ou fabrique abstraite crée des familles d'objets.

La fabrique abstraite définit des interfaces que les classes concrètes devront implémenter.

## Fabrique (simple)

Elle permet la création d'objet. Le code de l'application utilise la fabrique pour créer les objets dont elle a besoin.

```php
declare(strict_types=1);

namespace Factory;

use App\Bike;

class Factory
{
    public function createBike(): Bike
    {
        return new Bike();
    }
}
```

## Fabrique abstraite

La frabrique abstraite utilise des interfaces pour définir les objets de la fabrique.

Il permet la création de familles d'objets complèts sans avoir à préciser leurs classes concrètes. Voyez l'exemple suivant.

Définition de l'interface des types d'objets à créer.

```php
interface AbstractFactory {
	public function createSquare():AbstractSquare;
	public function createCircle():AbstractCircle;
}
```

Puis on définit une Factory concrète :

```php
class Factory2D implements AbstractFactory
{
    public function createSquare(): AbstractSquare
    {
        return new new Square();
    }

    public function createCircle(): AbstractCircle
    {
        return new Circle();
    }
}
```

Interfaces pour les objets

```php
interface AbstractSquare{
    public function draw();
}

interface AbstractCircle{
    public function draw();
}
```

Création des objets compatibles

```php
class Circle implements AbstractSquare {
	public function draw(){
		echo "Circle\n";
	}
}
class Square implements AbstractCircle {
	public function draw(){
		echo "Square\n";
	}
}
```

Dans l'application on utilisera alors la fabrique comme suit :

```php
$factory = new Factory2D();

echo $factory->createSquare();
echo $factory->createCircle();
```

## Exemple de Factory FactoryPDO

```php
class FactoryPDO
{
    private static $pdo = null;

    private static $defaults = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ];

    public static function build(string $dsn, string $username, string $password):\PDO{

        self::$pdo = new \PDO($dsn,
            $username, $password,
            self::$defaults
        );

        return self::$pdo;
    }

    public static function buildSqlite(string $dsn = 'sqlite::memory:' ):\PDO{
          self::$pdo = new \PDO($dsn, self::$defaults);

          return self::$pdo;
    }

    public static function reset():void{ self::$pdo = null ;}
}

$pdo = FactoryPDO::build(
    dsn :'mysql:host=localhost;dbname=blog;charset=utf8mb4',
    username: 'root',
    password: ''
);
```
