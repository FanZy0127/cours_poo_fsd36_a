<?php

namespace App\HtmlDecorator;

abstract class Decorator implements IHtml{

    public function __construct(protected IHtml $elem)
    {
        
    }
}