<?php

namespace Form\Fields;

use Form\Elemable;

class Label implements Elemable
{

    public function __construct(private string $name, private string $value, private Elemable $elem)
    {}

    public function addElem( Elemable $elem){
        $this->elem = $elem;
    }

    public function getName(): string
    {

        return $this->name;
    }

    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    public function __toString(): string
    {

        return sprintf('<label for="%s" value="%s" />%s</label>', $this->name, $this->value, $this->elem);
    }
}
