# Façade

Façade est un patron de conception structurel. Il offre une interface qui permet un accès simplifié à un framework ou librairie.

Par analogie on peut comparer une façade à un opérateur de commande dans un grand magasin, celui-ci joue le rôle de façade avec un système complexe pour préparer votre achat.

Supposons que l'on ait une classe "un peu" technique à instancier, nous aimerions passer par une façade pour s'abstraire de sa complexité.

```php
namespace Model;

class Post
{

    public function __construct(protected \PDO $pdo)
    {
        
    }

    public function all(){

        return "*";
    }
}

```

- La classe AbstractFacade

```php

abstract class AbstractFacade
{

    public static function __callStatic($method, array $args)
    {

        $instance = static::resolve(static::getFacadeAccessor());

        return call_user_func([$instance, $method], $args);
    }

    public static function resolve(array $args)
    {
        [$name, $pdo] = $args;

        $className = '\\Model\\' . ucfirst($name);

        return new $className($pdo);
    }
}

class Post extends AbstractFacade
{

    public static function getFacadeAccessor()
    {
        return ['post', new \PDO('sqlite:./database.sqlite') ];
    }
}
```

Dans l'application nous pourrions alors instancier la classe Post de manière extrêmement simple :

```php
Post::all();
```