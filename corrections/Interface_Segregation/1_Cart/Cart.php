<?php

/**
 * Un container 
 */
class Cart
{

    public function __construct(
        private $storage = [],
        private $tva = .2
    ) {
    }

    // Aggregation de produit(s) le contrat permet de rendre modulable le code 
    /**
     * L'interface permet donc de travailler (l'algo marche dans ce cas) avec des produits à partir du moment qu'ils implémentent l'interface Productable
     * Ici on voit que la modularité est totale, c'est le principe Interface Segregation de SOLID. Vous n'êtes pas limité à un type Objet unique, mais vous pouvez consommer n'importe qu'elle objet à partir du moment où celui-ci implément l'interface Productable
     */
    public function buy(Productable $product, int $quantity): void
    {
        $total = round( $quantity * $product->getPrice() * ($this->tva + 1), Productable::PRECISION_DECIMAL );

        if (array_key_exists($product->getName(), $this->storage)) {
            $this->storage[$product->getName()] += $total;

            return;
        }

        $this->storage[$product->getName()] = $total;
    }

    public function total():float{

        // TODO vérifier que l'on a pas de problème d'arrondi sur les sommes de nombres décimaux avec deux chiffres après la virgule
        return round( array_sum($this->storage) , Productable::PRECISION_DECIMAL ) ;
    }
}
