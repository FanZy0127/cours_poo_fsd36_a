<?php


function readChar($file)
{
    $f = fopen($file, 'r');

    while ( $line = fgets($f) ) {
        $line = str_replace(["\n", "\r"], ['', ''], $line);
        list($k, $v) = explode('=', $line);

        yield $k => $v;
    }
   
    fclose($f);
}

$gen = readChar('./content/content_key.txt', 2);

foreach ($gen as $key => $value) echo "$key  $value" . PHP_EOL;
