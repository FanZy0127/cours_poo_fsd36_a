<?php

namespace App\HtmlDecorator;

class Paragraph extends Decorator {

    public function __toString(): string
    {
        return "<p>{$this->elem->__toString()}</p>";
    }
}