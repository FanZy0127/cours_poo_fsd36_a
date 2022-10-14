<?php 
namespace Icecream;

class MenuGlacier {

  private IceCreamBuilder $IceCreamBuilder;

  public function __construct(IceCreamBuilder $IceCreamBuilder)
  {
    $this->IceCreamBuilder = $IceCreamBuilder;
  }

  public function SundayCaramel(string $cornet) : IceCream {
    return $this->IceCreamBuilder
    ->prepareIceCream($cornet)
    ->ajouterBoule('Vanille')
    ->ajouterBoule('Chocolat')
    ->ajouterSupplements('Caramel')
    ->ajouterSupplements('Noix')
    ->getIceCream()
;
  }

  public function boules_3_Caramel_Speculos(string $cornet) : IceCream {
    return $this->IceCreamBuilder
    ->prepareIceCream($cornet)
    ->ajouterBoule('Vanille')
    ->ajouterBoule('Chocolat')
    ->ajouterBoule('Café')
    ->ajouterSupplements('Caramel')
    ->ajouterSupplements('Speculos')
    ->getIceCream()
;
  }

}