<?php 
/**
 * Les définitions des contrats sont publiques dans une interface, ce sont des méthodes qui définiront un comportement de votre objet consommer dans le script courant.
 */
interface Productable{

    // On peut mettre dans un contrat des constantes (c'est publique par défaut)
    const PRECISION_DECIMAL = 2;

    public function getName():string;
    public function setName(string $name):self;
    public function getPrice():float;
    public function setPrice(float $price):self; // j'impose que l'on retourne l'objet lui-même dans le script courant
}