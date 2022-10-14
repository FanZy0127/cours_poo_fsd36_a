<?php

namespace Cart;

class Cart
{

    // .2 <=> 0.2
    public function __construct(private Storable $storage, private float $tva = .2)
    {
    }

    public function buy(Productable $p, int $quantity): void
    {

        $total = abs($quantity * $p->getPrice() * ($this->tva + 1));

        $this->storage->setValue($p->getName(), $total);
    }

    public function reset(): void
    {
        $this->storage->reset();
    }

    public function restore(Productable $p): void
    {

        $this->storage->restore($p->getName());
    }

    public function total(): float
    {

        return round(array_sum($this->storage->getStorage()), $_ENV['APP_PRECISION'] ?? 3 );
    }
}
