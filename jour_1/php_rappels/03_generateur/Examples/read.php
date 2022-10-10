<?php

function genFile($file){

    $f = fopen($file, 'r');

    while($line = fgets($f)) yield $line;

    fclose($f);
}

$gen = genFile('./content.txt');

foreach($gen as $line) echo $line;