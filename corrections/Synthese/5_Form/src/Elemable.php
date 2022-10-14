<?php

namespace Form;

interface Elemable
{
    public function getName(): string;
    public function setValue(string $value): void;
    public function __toString(): string;
}
