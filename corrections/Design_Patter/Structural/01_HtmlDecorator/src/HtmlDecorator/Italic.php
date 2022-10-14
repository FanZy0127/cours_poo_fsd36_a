<?php

namespace App\HtmlDecorator;

class Italic extends Decorator {

    public function __toString(): string
    {
        return "<em>{$this->elem->__toString()}</em>";
    }
}