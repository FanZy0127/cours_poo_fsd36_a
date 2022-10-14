<?php

use Cart\{Cart, Product};
use Cart\Observers\{LogFile, LogSum};

use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{

    protected Cart $cart;
    protected SplObserver $observerSum;
    protected SplObserver $observerFile;
    protected $fileName = __DIR__ . '/_data/log.txt';

    public function setUp(): void
    {
        $this->cart = new Cart([]);
        $this->observerSum = new LogSum();
        $this->observerFile = new LogFile($this->fileName);

        $this->cart->attach($this->observerSum);
        $this->cart->attach($this->observerFile);
    }

    /**
     * @testdox add product and check if the total amount is notified
     * @covers Cart::buy LogFile::getStrorage LogSum::getStorage
     * @dataProvider productProviders
     */
    public function testBuyProduct($product, $quantity): void
    {

        $this->cart->buy($product, $quantity);

        $this->assertEquals($this->observerSum->getStorage(), $this->cart->total());
        $this->assertEquals($this->observerFile->getStorage(), $this->cart->total());
    }

    /**
     * @testdox restore product and check if the total amount is notified
     * @covers Cart::buy Cart::restore LogFile::getStrorage LogSum::getStorage
     */
    public function testRestoreProduct(): void
    {
        $apple = new Product(name: 'apple', price: 1.2);
        $raspberry = new Product(name: 'raspberry', price: 0.2);
        $this->cart->buy($apple, 10);
        $this->cart->buy($raspberry, 10);

        $this->assertEquals($this->observerSum->getStorage(), $this->cart->total());
        $this->assertEquals($this->observerFile->getStorage(), $this->cart->total());

        $this->cart->restore($raspberry);

        $this->assertEquals($this->observerSum->getStorage(), $this->cart->total());
        $this->assertEquals($this->observerFile->getStorage(), $this->cart->total());
    }

     /**
     * @testdox if we have more observers then an exception is thrown 
     * @covers Cart::buy Cart::restore LogFile::getStrorage LogSum::getStorage
     */
    public function testDetachObserverException(): void
    {
        $this->cart->detach($this->observerFile);
        $this->cart->detach($this->observerSum);

        $apple = new Product(name: 'apple', price: 1.2);

        $this->expectException(LogicException::class);
        $this->expectErrorMessage("Zero Observer ...");

        $this->cart->buy($apple, 10);
    }

     /**
     * @testdox reset total zero
     * @covers Cart::buy Cart::reset LogFile::getStrorage LogSum::getStorage
     */
    public function testResetProduct(): void
    {
        $apple = new Product(name: 'apple', price: 1.2);
        $this->cart->buy($apple, 10);
        $this->cart->reset();

        $this->assertEquals($this->observerSum->getStorage(), $this->cart->total());
        $this->assertEquals($this->observerFile->getStorage(), $this->cart->total());
    }

    public function productProviders(): array
    {

        return [
            [new Product(name: 'apple', price: 1.5), 10],
            [new Product(name: 'raspberry', price: .5), 10],
            [new Product(name: 'strawberry', price: 2.5), 10],
        ];
    }
}
