<?php

require_once __DIR__ . '/vendor/autoload.php';

use Form\Fields\{Button, Number, Password, Text, Label };
use Form\Form;

$form = new Form(action : "/", name : "superform");

/**
 *  Il ne faut pas aller plus dans la logique de modularité pour la gestion des labels, on a ici exploité au maximun ce que l'on a appris avec SOLID
 *  Pour aller plus loin dans la modularité il nous faudra apprendre les designs pattern.
 * 
 */

$labelFirstName = new Label(name :'firstName', value: 'Votre firstName', elem : new Text(name: "fistName") ) ;
$form->add($labelFirstName);

$labelLastName = new Label(name :'lastName', value: 'Votre lastName', elem : new Text(name: "lastName") ) ;
$form->add($labelFirstName);

$labelAge = new Label(name :'age', value: 'Votre Age', elem : new Number(name: "age") ) ;
$form->add($labelAge);

$form->add(new Password(name: "password"));
$form->add(new Button(name: "ok", value: "ok"));

$form->render();