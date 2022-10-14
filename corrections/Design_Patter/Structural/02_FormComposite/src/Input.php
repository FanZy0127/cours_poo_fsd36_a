<?php

namespace App;


class Input extends Component
{
    public function __construct(protected string $type, protected string $name, protected string $value = ''){}

    public function operation(): string
    {
        return "<input type=\"{$this->type}\" name=\"{$this->name}\" value=\"{$this->value}\"/>";
    }
}
