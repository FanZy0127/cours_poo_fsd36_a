<?php
namespace App;

class EventManager{

    public static array $events = [];

    public static function trigger(string $event, $argv = []){

        if(isset(self::$events[$event])){
            foreach(self::$events[$event] as $callback ) $callback($argv);
        }

        return null;
    }

     public static function attach(string $event, \Closure $callback):void{
         self::$events[$event][] = $callback;
     }
}