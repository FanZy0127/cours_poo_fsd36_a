<?php

namespace Cart;

use LogicException;
use SplSubject;
use SplObserver;
use SplObjectStorage;

class Cart implements SplSubject
{
    private $storage;
    private $tva;
    private SplObjectStorage $observers;

    public function __construct(array $storage = [], float $tva = 0.2)
    {
        $this->tva = $tva;
        $this->storage = $storage;

        $this->observers = new SplObjectStorage();
    }

    public function buy(Product $product, int $quantity): void
    {
        $total = $quantity * $product->getPrice() * ($this->tva + 1);
        $this->storage[$product->getName()] = $total;

        $this->notify();
    }

    public function reset(): void
    {
        $this->storage = [];

        $this->notify();
    }

    public function total(): float
    {
        return array_sum($this->storage);
    }

    public function restore(Product $product): void
    {
        if (isset($this->storage[$product->getName()])) {
            unset($this->storage[$product->getName()]);

            $this->notify();
        }
    }

    public function attach(SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer)
    {
        if ($this->observers->contains($observer))
            $this->observers->detach($observer);
    }

    public function notify()
    {
        if ($this->observers->count() === 0)
            throw new LogicException("Zero Observer ...");

        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}
