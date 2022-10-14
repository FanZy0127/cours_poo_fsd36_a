<?php 
namespace Icecream;

class IceCreamBuilder {
  private $IceCream;

  public function prepareIceCream(string $Cornet) : IceCreamBuilder
  {
      $this->IceCream = null;
      $this->IceCream = new IceCream();
      $this->IceCream->choisirCornet($Cornet);
      return $this;
  }

  public function ajouterBoule(string $parfum) : IceCreamBuilder 
  {
    $this->IceCream->ajouterBoules($parfum);

    return $this;
  }

  public function ajouterSupplements(string $supplement) : IceCreamBuilder 
  {
    $this->IceCream->ajouterSupplements($supplement);

    return $this;
  }

  public function getIceCream() : IceCream
  {
      return $this->IceCream;
  }


}