<?php

spl_autoload_register(function ($class) {
    include __DIR__ . '/' . $class . '.php';
});

$lamp = new Lamp( new Light );

echo $lamp . PHP_EOL;

$lamp->switch();

echo $lamp . PHP_EOL;

$lamp->switch();

echo $lamp . PHP_EOL;

$lamp->switch();

echo $lamp . PHP_EOL;

$lamp->switch();

echo $lamp . PHP_EOL;