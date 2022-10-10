<?php

list($a, $b , $c) = [1, 2, 3];

echo "a : $a, b $b, c $c" . PHP_EOL;

// die;

function permute(&$a, &$b, &$c)
{
    list($a, $b, $c) = [$b, $c, $a];
}
permute($a, $b, $c);

echo "a : $a, b $b, c $c" . PHP_EOL;
