<?php

namespace App;


abstract class Composite extends Component
{

    protected \SplObjectStorage $childrens;

    public function __construct()
    {
        $this->childrens = new \SplObjectStorage();
    }

    public function add(Component $elem): void
    {
        $this->childrens->attach($elem);
    }

    public function remove(Component $elem): void
    {
        $this->childrens->detach($elem);
    }

    public function operation(): string
    {
        $output = '';
        foreach ($this->childrens as $children) {
            $output .= $children->operation();
        }

        return $output;
    }


    public function __toString(): string
    {
        // var_dump($this->operation());

        return $this->operation();
    }
}
