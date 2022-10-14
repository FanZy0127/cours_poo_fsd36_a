<?php

namespace Form;

class Form
{

    public function __construct(
        private string $action,
        private string $name,
        private array $elems = []
    ) {
    }

    public function add(Elemable $elem)
    {
        $this->elems[] = $elem;
    }

    public function render()
    {
        echo sprintf('<form action="%s" name="%s" >%s', $this->action, $this->name, PHP_EOL);
        foreach ($this->elems as $elem) echo $elem . PHP_EOL;
        echo sprintf('</form>%s', PHP_EOL);
    }
}
