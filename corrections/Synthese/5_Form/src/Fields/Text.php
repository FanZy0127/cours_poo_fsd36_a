<?php 

namespace Form\Fields;

use Form\Elemable;

class Text implements Elemable{
    
    public function __construct(private string $name, private string $value = '')
    {}

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

        return sprintf('<input name="%s" value="%s" type="text" />', $this->name, $this->value);
    }
}