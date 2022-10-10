<?php

function zipper(array $tab1, array $tab2): array 
{
    if(count($tab1) !== count($tab2)) return [] ;

    $res = [];

    for ($i=0; $i < count($tab1) ; $i++) { 
        $res[] = [$tab1[$i], $tab2[$i]];
    }

    return $res;
}

var_dump(zipper(tab1 : [1,2,3], tab2: [4,5,6]));
