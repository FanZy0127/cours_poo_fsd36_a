<?php 
namespace Icecream;


interface Vendable {
  public function setPrices();
  public function ajouterPrix(int $prix);
  public function getPrice(array $product, string $key);
}

class IceCream implements Vendable {
  private $Cornet;
  private $Boules = [];
  private $Supplements = [];

  private $price;
  private $cornetPrix;
  private $boulesPrix;
  private $supplement;

  public function __construct() {
    $this->setPrices();
  }
  public function choisirCornet(string $cornet) {
    $this->Cornet = $cornet;
    $this->ajouterPrix($this->cornetPrix[$cornet]);
  }

  public function ajouterBoules(string $parfum) {
    $this->Boules[] = $parfum;
    $nbrBoules = count($this->Boules);
    $this->ajouterPrix($this->boulesPrix[$nbrBoules]);
  }

  public function ajouterSupplements(string $supplement) {
    $this->Supplements[] = $supplement;
    $this->ajouterPrix($this->supplement[$supplement]);
  }

  public function getPrice(array $product, string $key) {
    return $product[$key];
  }

  public function ajouterPrix(int $prix) {
    $this->price += $prix;
  }


  public function setPrices() {
    $this->price = 0.00;
    $this->cornetPrix = array(
      "Classic" => 5,
      "Gaufre" => 6,
      "Pot" => 4,
    );
    $this->boulesPrix = array(
      1 => 0,
      2 => 2,
      3 => 4,
      4 => 6
    ); 
    $this->supplement = array(
      "Chocolat" => 2,
      "Fraise" => 2,
      "Framboise" => 2,
      "Caramel" => 2,
      "Noix" => 3,
      "Speculos" => 3
    );
  }

  public function __toString()
  {
    return " total prix  : " . $this->price . "€";
  }
}


