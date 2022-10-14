<?php

namespace App;

class Wrapper extends Composite
{

    public function operation(): string
    {
        $output = parent::operation();

        return "<div class=\"wrapper-content\">$output</div>";
    }
}
