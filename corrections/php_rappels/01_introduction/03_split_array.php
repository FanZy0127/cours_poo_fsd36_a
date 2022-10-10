<?php
namespace split ;

function split_array(array $numbers, int $pos): array
{
    if ($pos > count($numbers)) return $numbers;

    list($start, $i) = [[], 0];

    while ($i++ <= $pos) 
        $start[] = array_shift($numbers);

    return [$start, $numbers];
}

var_dump(split_array(numbers: [4,6,9, 17], pos: 2  ));