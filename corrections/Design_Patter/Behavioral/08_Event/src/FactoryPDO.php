<?php

namespace App;

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

    public static function buildSqlite(string $dsn):\PDO{
        
         return self::$pdo = new \PDO($dsn);
    }

    public static function reset():void{ self::$pdo = null ;}
}