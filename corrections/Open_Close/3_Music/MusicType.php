<?php

abstract class MusicType
{
    protected $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    abstract public function listen();
}
