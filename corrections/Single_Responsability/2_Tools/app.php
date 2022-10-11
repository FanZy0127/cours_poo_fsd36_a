<?php

spl_autoload_register(function ($class) {
    include __DIR__ . '/' . $class . '.php';
});

$router = new Router();
$token = new Token();
$date = new Token();
