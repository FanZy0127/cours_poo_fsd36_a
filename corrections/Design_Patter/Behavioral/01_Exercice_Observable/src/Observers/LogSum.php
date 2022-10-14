<?php

namespace Cart\Observers;

use SplSubject;
use SplObserver;

class LogSum implements SplObserver{

    private $storage = 0;

    public function update(SplSubject $subject):void{

        $this->storage = $subject->total();
    }

    public function getStorage():float{

        return $this->storage;
    }
}