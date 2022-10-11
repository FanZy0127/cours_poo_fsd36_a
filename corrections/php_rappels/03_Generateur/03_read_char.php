<?php

function readChar($file, $modulo = 2){

    $f = fopen($file, 'r');

    while($line = fgets($f)) {
        $line = (int) $line ;

        if( $line % $modulo === 0) yield $line;
    }

    fclose($f);
}

$gen = readChar('./content/char.txt', 2);

foreach($gen as $line) echo $line . PHP_EOL;