<?php

require_once __DIR__ . '/vendor/autoload.php';

use Ds\Map;

use App\ReadIterator;
use App\Model\person;

$relationships = new ReadIterator(__DIR__ . '/Data/relationships.txt');
$populations = new ReadIterator(__DIR__ . '/Data/populations.txt');

$storage = new Map();
$total = 0;

foreach ($populations as [$id, $name]) {
    $person = new Person(name: $name, id: $id, relation: []);
    $storage->put((int) $id, $person);
    $total += 1;
}

foreach ($relationships as [$i, $j]) {
    $storage->get((int) $i)->setRelation($storage->get((int) $j));
    $storage->get((int) $j)->setRelation($storage->get((int) $i));
}

// Calcul de la moyenne
$avg_relation = round($storage->reduce(function ($acc, $index, $pop) {
    return $acc + count($pop->getRelation());
}, 0) / $total, 2);

echo $avg_relation; 
echo PHP_EOL;


## Exemple de générateur

function personGenerate($populations){
    foreach ($populations as [$id, $name]) {
        //  requête fetch pour récupérer les relations $relation
        //  yield new Person(name: $name, id: (int) $id, relation: $relation);
        yield new Person(name: $name, id: (int) $id, relation: []);
    }
}

foreach(personGenerate($populations) as $user) print_r($user); // __toString