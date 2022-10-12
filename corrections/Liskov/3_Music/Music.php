<?php

require_once 'UnknownExtensionException.php';

// Si on ajoute un nouveau format, cette classe ne change plus :-)
class Music
{
    private $musicType;

    public function __construct(MusicType $musicType)
    {
        $this->musicType = $musicType;

        $extension = pathinfo($this->musicType->getFilename(), PATHINFO_EXTENSION);
        
        if (empty($extension)) {
            throw new UnknownExtensionException();
        }
    }

    public function listen()
    {
        return $this->musicType->listen();
    }
}