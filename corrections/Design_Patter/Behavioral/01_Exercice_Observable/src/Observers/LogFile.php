<?php

namespace Cart\Observers;

use SplSubject;
use SplObserver;

class LogFile implements SplObserver{

    public function __construct(private string $fileName)
    {
        
    }

    public function update(SplSubject $subject):void{

        file_put_contents($this->fileName, $subject->total() . "\n");
    }

    public function getStorage():float{

        $total = file_get_contents($this->fileName);

        return  (float) $total;
    }
}